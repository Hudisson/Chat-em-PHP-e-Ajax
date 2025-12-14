    


    // VARIÁVEIS DE CONTROLE GLOBAIS 
    var requisicaoConversas = null; // Armazena o objeto AJAX para abortar
    var intervaloConversas = null; // Armazena o ID do setInterval para parar
    var currentFriendId = null; // ID do amigo com quem estamos conversando
    let ultimaImagem = null; // Para o polling de imagem


    // --- FUNÇÕES DE POLLING ---

    function verificarImagem() {
        $.ajax({
            url: APP_URL + "/buscar-foto",
            method: "POST",
            data: {
                id: id_usuario
            },
            dataType: "json",
            success: function(res) {
                if (res.imagem && res.imagem !== ultimaImagem) {
                    $("#fotoPerfil").attr("src", "../../../resources/" + res.imagem);
                    ultimaImagem = res.imagem;
                }
            }
        });
    }

    function buscarUsuariosLogados() {
        $.ajax({
            url: APP_URL + "/buscar-logados",
            method: "POST",
            data: {
                id: id_usuario
            },
            dataType: "json",
            success: function(res) {
                $("#lista-amigos").empty();
                res.forEach(function(user) {
                    let html = ` 
                         <div class="friend-item conversar-btn">
                            <img class="friendFotoPerfil" src="../../../resources/${user.photo_profile}" alt="Foto de Perfil">
                            <div class="friend-info">
                                <span class="friend-name">${user.user_name}</span>
                                <span class="friend-id">${user.user_id}</span>
                            </div>
                            <span class="status status-${user.user_online}">${user.user_online}</span>
                        </div>
                    `;
                    $("#lista-amigos").append(html);
                });
            }
        });
    }

    // FUNÇÃO DE BUSCA DE CONVERSAS
    function buscarCoversas() {
        // Só executa se houver um amigo selecionado
        if (!currentFriendId) {
            return;
        }

        // 1 - CHECAGEM DE ABORTO 
        if (requisicaoConversas && requisicaoConversas.readyState !== 4) {
            requisicaoConversas.abort();
            console.log("Requisição de conversas anterior abortada.");
        }

        // 2 - Armazena o novo objeto AJAX 
        requisicaoConversas = $.ajax({
            url: APP_URL + "/conversas",
            method: "POST",
            data: {
                id_user: id_usuario,
                id_friend: currentFriendId // Id do amigo selecionado para conversar
            },
            dataType: "json",

            success: function(res) {
                $("#conversas").empty();

                res.forEach(function(msg) {
                    let isRemetente = (msg.remetente == id_usuario);
                    let className = isRemetente ? 'msg-enviada' : 'msg-recebida';
                    let html = `  
                        <div class="${className}">
                            ${msg.mensagem}
                            <div class="data-mensagem">${msg.msg_created_at}</div>
                        </div>
                    `;
                    $("#conversas").append(html);
                });
            },

            error: function(xhr, status, error) {
                // Ignora o erro se o status for 'abort'
                if (status !== 'abort') {
                    console.error("Erro ao buscar conversas:", status, error);
                }
            }
        });
    }


    // --- MANIPULADORES DE EVENTO ---

    //  1. ENVIO DO FORMULÁRIO
    $('#Formulario-Mensagem').submit(function(event) {
        event.preventDefault();
        var $form = $(this);
        var formData = $form.serialize();

        $.ajax({
            type: 'POST',
            url: $form.attr('action') || APP_URL + '/home', // Garante que o action exista mesmo que o atributo action do form esteja vazio
            data: formData,
            dataType: 'html',

            success: function(response) {
                // 1 - Limpa o formulário
                $form[0].reset();

                // 2 - Atualizar a conversa (Sincronização)
                buscarCoversas();
            },

            error: function(xhr, status, error) {
                alert('Erro ao enviar mensagem: ' + status);
            }
        });
    });

    // 2 - CLIQUE EM AMIGO (Selecionar uma amigo para conversar)
    $('#lista-amigos').on('click', '.conversar-btn', function() {

        $("#contact-msg").empty();
        $("#remetente_destinatario").empty();

        let userId = $(this).find('.friend-id').text();
        let userName = $(this).find('.friend-name').text();
        let stausOnline = $(this).find('.status').text();

        // 1 - Armazena o ID do amigo globalmente
        currentFriendId = userId;

        // Atualiza os inputs escondidos do formulário
        let html_remetente_destinatario = `  
            <input type="text" id="id_remetente" name="id_remetente" value="${id_usuario}">         
            <input type="text" id="id_destinatario" name="id_destinatario" value="${userId}">
        `;
        $("#remetente_destinatario").append(html_remetente_destinatario);

        // Atualiza o cabeçalho do chat
        let html = `<span class="contact-name">${userName}</span><span class="status status-${stausOnline}">${stausOnline}</span>`;
        $("#contact-msg").append(html);


        // 2 - PARA O INTERVALO ANTERIOR (Usa a variável global)
        if (intervaloConversas) {
            clearInterval(intervaloConversas);
        }

        // 3 - INICIA A BUSCA IMEDIATAMENTE
        buscarCoversas();

        // 4 - Configura o novo intervalo (Usa a variável global)
        intervaloConversas = setInterval(buscarCoversas, 1000);

    });


    // --- INICIALIZAÇÃO DE POLLING ---

    verificarImagem();
    setInterval(verificarImagem, 10000);

    buscarUsuariosLogados();
    setInterval(buscarUsuariosLogados, 12000);