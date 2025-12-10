<?php


session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: $APP_URL", true, 302);
    exit();
}

include_once "includes/header.php";
?>

<style>
    .linha-vertical {
        border-left: 2px solid;
        box-sizing: border-box;
        height: 30px;
        margin-left: 10px;
    }
</style>

<div class="container wrapper">
    <header>
        <div class="header-info">

            <div class="logo-chat">
                <h1>Home Chat</h1>
            </div>

            <div class="profile-summary">
                <span> <?php echo $_SESSION['usuario_logado']; ?> </span>
                <span class="online-status"><?php echo $_SESSION['usuario_oline']; ?></span>
                <a href='<?php echo "$APP_URL/settings"; ?>' class="logout">Settings</a>
                <div class="linha-vertical"></div>
                <a href='<?php echo "$APP_URL/sair"; ?>' class="logout">Logout</a>
            </div>


            <script>
                // id do usuario
                const id_usuario = "<?php echo $_SESSION['usuario_logado_id']; ?>"

                // Armazena a última imagem usada para detectar mudanças
                let ultimaImagem = null;

                function verificarImagem() {
                    $.ajax({
                        url: "<?php echo $APP_URL ?>/buscar-foto",
                        method: "POST",
                        data: {
                            id: id_usuario
                        },
                        dataType: "json",

                        success: function(res) {
                            if (res.imagem) {
                                if (res.imagem !== ultimaImagem) {
                                    $("#fotoPerfil").attr("src", "../../../chat/resources/" + res.imagem);
                                    ultimaImagem = res.imagem;
                                }
                            }
                        }

                    });
                }

                // primeira execução
                verificarImagem();

                // repetir a cada 10 segundos
                setInterval(verificarImagem, 10000);
            </script>

            <div class="profile-image-container">
                <img id="fotoPerfil" src="" alt=" Foto de <?php echo $_SESSION['usuario_logado']; ?>">
            </div>

        </div>
    </header>

    <div class="container main-layout">

        <div class="chat-view">
            <div class="contact-msg">
                <span class="contact-name">Fulano da Silva</span>
                <span class="status">Online</span>
            </div>

            <div class="conversation">


                <div class="msg-received">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil.
                    <div class="data-mensagem">2025-12-06 às 23:32:10</div>
                </div>

                <div class="msg-sent">
                    Consectetur adipisicing elit.
                    <div class="data-mensagem">2025-12-06 às 23:32:10</div>
                </div>
            </div>

        </div>

        <aside class="contact-list">
            <div class="search">
                <label for="search-input">Pesquisar contato</label>
                <input type="text" class="form-control" id="search-input" placeholder="Pesquisar">
            </div>

            <div class="contacts-container" id="lista-amigos">


            </div>

            <script>
                function buscarUsuariosLogados() {
                    $.ajax({
                        url: "<?php echo $APP_URL ?>/buscar-logados",
                        method: "POST",
                        data: {
                            id: id_usuario
                        },
                        dataType: "json",
                        success: function(res) {

                            console.log(res);

                            // limpa a lista antes de recriar
                            $("#lista-amigos").empty();

                            // loop nos usuários
                            res.forEach(function(user) {

                                console.log("Usuarios: "+user);

                                // monta o HTML de cada amigo
                                let html = `
                                        <div class="friend-item">
                                            <img class="friendFotoPerfil" src="../../../chat/resources/${user.photo_profile}" alt="Foto de Perfil">

                                            <div class="friend-info">
                                                <span class="friend-name">${user.user_name}</span>
                                            </div>

                                            <span class="status">Online</span>
                                        </div>
                                `;

                                // adiciona na div principal
                                $("#lista-amigos").append(html);
                            });
                        }
                    });
                }

                // primeira execução
                buscarUsuariosLogados();

                // repetir a cada 12s
                setInterval(buscarUsuariosLogados, 12000);
            </script>

        </aside>

    </div>

</div>

<?php
include_once "includes/footer.php";
?>