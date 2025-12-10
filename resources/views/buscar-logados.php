<?php

use App\service\UsuarioLogadoService;


session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: $APP_URL", true, 302);
    exit();
}

if (isset($_POST['id'])) {

    $usuariosLogado = UsuarioLogadoService::getUsersLogado($_POST['id']);


    if (!is_array($usuariosLogado)) {
        $usuariosLogado = [];
    }

    foreach ($usuariosLogado as &$user) {
        if (empty($user['photo_profile'])) {
            $user['photo_profile'] = "../../../chat/resources/assets/img/user_996351.png";
        }
    }

    echo json_encode($usuariosLogado);

}
