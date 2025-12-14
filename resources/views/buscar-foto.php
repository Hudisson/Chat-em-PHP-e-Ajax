<?php

use App\service\SettingsService;

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: $APP_URL", true, 302);
    exit();
}

if(isset($_POST['id'])){

    $fotoPerfil = SettingsService::getFotoDePerfil($_POST['id']);
    
    echo json_encode(["imagem" => $fotoPerfil]);


}

?>
