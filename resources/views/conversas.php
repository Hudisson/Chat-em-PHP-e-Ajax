<?php

use App\service\MensagemService;

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: $APP_URL", true, 302);
    exit();
}

if(isset($_POST['id_user']) && isset($_POST['id_friend'])){

    $mensagens = MensagemService::getMensagens($_POST['id_user'], $_POST['id_friend'] );

    echo json_encode($mensagens);

}