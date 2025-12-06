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
if (isset($_FILES['foto_para_upload']) && isset($_POST['id_usuario'])) {
    $photoProfile = new HomeController();

    $photoProfile->setPhotoProfile($_FILES['foto_para_upload']);
    $photoProfile->setIdUsuario($_POST['id_usuario']);

    $status = $photoProfile->uploadPhotoProfile();
}

?>

<div class="container">

    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow-lg p-2 custom-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 text-primary">Selecione uma foto para o seu perfil</h2>
                    <p>Id: <?php echo $_SESSION['usuario_logado_id']; ?></p>


                    <?php if (array_key_exists("sucesso", $status)): ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?php echo $status['sucesso']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <?php if (array_key_exists("erro", $status)): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert"" role="alert">
                            <?php echo $status['erro']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form action="<?php echo "$APP_URL/settings"; ?>" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Escolha uma imagem : <b>png, jpg ou jpeg </b> </label>
                            <input class="form-control" type="file" name="foto_para_upload" id="foto_para_upload">
                            <input type="text" name="id_usuario" value="<?php echo $_SESSION['usuario_logado_id']; ?>" style="display: none">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg" name="submit">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php
include_once "includes/footer.php";
?>