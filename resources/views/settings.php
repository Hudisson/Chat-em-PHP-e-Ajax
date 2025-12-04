<?php

use App\controller\HomeController;

session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header("Location: $APP_URL", true, 302);
    exit();
}


include_once "includes/header.php";

# Verificar se foi enviado um arquivo
$status = [];
if(isset($_FILES['foto_para_upload'])){
    $photoProfile = new HomeController();

    $photoProfile->setPhotoProfile($_FILES['foto_para_upload']);

    $status = $photoProfile->uploadPhotoProfile();

    echo "<pre>";
    print_r($status);
    echo "</pre>";
}

?>




<h2>Selecione um Arquivo para Upload</h2>
<form action="<?php echo "$APP_URL/settings"; ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="foto_para_upload">
    <button type="submit" name="submit">Fazer Upload</button>
</form>