<?php

use App\service\MensagemService;

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: $APP_URL", true, 302);
    exit();
}

if (isset($_POST['id_remetente']) && isset($_POST['id_destinatario']) && isset($_POST['message-input'])) {

    if (!empty($_POST['message-input']) && !empty($_POST['id_remetente']) && !empty($_POST['id_destinatario'])) {
        $msg = MensagemService::sendMensage($_POST['id_remetente'], $_POST['id_destinatario'], $_POST['message-input']);
    }
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

    #id_remetente,
    #id_destinatario {
        display: none;
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
                <span class="online-status estou-online"><?php echo $_SESSION['usuario_oline']; ?></span>
                <a href='<?php echo "$APP_URL/settings"; ?>' class="logout">Settings</a>
                <div class="linha-vertical"></div>
                <a href='<?php echo "$APP_URL/sair"; ?>' class="logout">Logout</a>
            </div>

            <div class="profile-image-container">
                <img id="fotoPerfil" src="" alt=" Foto de <?php echo $_SESSION['usuario_logado']; ?>">
            </div>

        </div>
    </header>

    <div class="container main-layout">

        <div class="chat-view">
            <div class="contact-msg" id="contact-msg"></div>
            <div class="conversation" id="conversas"></div>

            <div id="chat-input-area" class="p-3 border-top bg-light">
                <form id="Formulario-Mensagem" class="d-flex align-items-end gap-2" method="POST" action="">

                    <div class="form-floating flex-grow-1 mb-0">
                        <div id="remetente_destinatario"></div>
                        <textarea
                            id="message-input"
                            name="message-input"
                            class="form-control"
                            placeholder="Digite sua mensagem aqui"
                            style="height: 50px; resize: none;"
                            required></textarea>
                        <label for="message-input">Digite sua mensagem...</label>
                    </div>

                    <button type="submit" id="send-button" class="btn btn-primary d-flex align-items-center mb-1" style="height: 52px;">
                        <span class="ms-1 d-none d-sm-inline">Enviar</span>
                    </button>
                </form>
            </div>
        </div>

        <aside class="contact-list">
            <div class="contacts-container" id="lista-amigos"></div>
        </aside>

    </div>

</div>

<script>
    const id_usuario = "<?php echo $_SESSION['usuario_logado_id']; ?>"; // id do usuario (seu id) - Variável de configuração
    const APP_URL = "<?php echo $APP_URL ?>"; // Necessário para todas as requisições (URL base das requisições)
</script>

<script src="../../../chat/resources/assets/js/script.js"></script>

<?php
include_once "includes/footer.php";
?>