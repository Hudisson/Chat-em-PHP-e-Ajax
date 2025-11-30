<?php

use App\controller\CadastroController;

include_once "includes/header.php";
?>

<style>
    form .field i.active::before {
        color: #333;
        content: '\f070';
    }
</style>


<?php

$status = []; // 1. Declara um array para armazena a(s) resposta(s)

// 2. Verifica se os campos do formulário foram enviados
if (isset($_POST['nomeCompleto']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['rsenha'])) {

    // 3. Cria uma instâcia da Classe CadastroController
    $newUser = new CadastroController();

    // 4. Inseri os valore dos campos em seus respectivos métodos SET
    $newUser->setNome(htmlspecialchars($_POST['nomeCompleto'], ENT_QUOTES, 'UTF-8'));
    $newUser->setEmail(htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'));
    $newUser->setSenha(htmlspecialchars($_POST['senha'], ENT_QUOTES, 'UTF-8'));
    $newUser->setRSenha(htmlspecialchars($_POST['rsenha'], ENT_QUOTES, 'UTF-8'));

    if(isset($_POST['termos'])){
        $newUser->setTermos('aceito');
    }else{
        $newUser->setTermos(null);
    }


    // 5. Retorna a resposta para o array $status
    $status = $newUser->newUser();
}
?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow-lg p-2 custom-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 text-primary">Crie sua Conta!</h2>

                    <?php if (array_key_exists("erro", $status)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $status['erro']; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (array_key_exists("sucesso", $status)): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $status['sucesso']; ?>
                        </div>
                    <?php endif; ?>

                    <form action="#" method="POST">
                        <div class="mb-3">
                            <label for="nomeCompleto" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nomeCompleto" name="nomeCompleto" placeholder="Seu Nome e Sobrenome">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Endereço de E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com">
                        </div>

                        <div class="mb-3 field">
                            <label for="senha" class="form-label">Senha</label>

                            <input type="password" style='<?php if ($status['erro'] == "As senhas são diferentes"): ?> border: 3px solid red; <?php endif; ?>' class="form-control" id="senha" name="senha" placeholder="Mínimo 8 caracteres" minlength="8">
                            <i class="fas fa-eye"></i>

                        </div>

                        <div class="mb-3 field field-rsenha">
                            <label for="rsenha" class="form-label">Repita a senha</label>
                            <input type="password" style='<?php if ($status['erro'] == "As senhas são diferentes"): ?> border: 3px solid red; <?php endif; ?>' class="form-control" id="rsenha" name="rsenha" placeholder="Mínimo 8 caracteres" minlength="8">
                            <i class="fas fa-eye"></i>
                        </div>


                        <div class="mb-3 form-check" style='<?php if ($status['erro'] == "É preciso aceitar os termos de uso"): ?> border: 3px solid red; <?php endif; ?>'>
                            <input type="checkbox" class="form-check-input" id="termos" name="termos" >
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