<?php
include_once "includes/header.php";
?>

<style>
    form .field i.active::before{
    color: #333;
    content: '\f070';
}
</style>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow-lg p-2 custom-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 text-primary">Crie sua Conta!</h2>

                    <div class="alert alert-danger" role="alert">
                        Aqui mostrará uma mensagem de erro!
                    </div>

                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="nomeCompleto" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Seu Nome e Sobrenome" required>
                        </div>

                        <div class="mb-3">
                            <label for="nomeUsuario" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nascimento" name="nascimento" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Endereço de E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required>
                        </div>

                        <div class="mb-3 field">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Mínimo 8 caracteres" required minlength="8">
                            <i class="fas fa-eye"></i>
                        </div>

                        <div class="mb-3 field field-rsenha">
                            <label for="rsenha" class="form-label">Repita a senha</label>
                            <input type="password" class="form-control" id="rsenha" name="rsenha" placeholder="Mínimo 8 caracteres" required minlength="8">
                            <i class="fas fa-eye"></i>
                        </div>


                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="termos" name="termos" required>
                            <label class="form-check-label" for="termos">Eu concordo com os <a href="<?php echo $APP_URL; ?>/termos-de-servico" class="text-decoration-none">Termos de Serviço</a></label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
                        </div>
                    </form>

                    <hr class="my-4">

                    <p class="text-center">Já tem uma conta? <a href="<?php echo $APP_URL; ?>" class="text-decoration-none">Faça Login</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../../chat/resources/assets/js/eyeScriptCadastro.js"></script>

<?php
include_once "includes/footer.php";
?>