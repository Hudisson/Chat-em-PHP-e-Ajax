<?php
session_start(); // 1. Inicia a sessão

// 2 Verifica o usuário estar logado e, se retorna verdadeiro, o redireciona para à página home
if(isset($_SESSION['usuario_logado'])){
    header("Location: $APP_URL/home", true, 302);
    exit();
}

use App\controller\LoginController;

$status = []; // 3. Declara um array para armazena a(s) resposta(s)

// 4. Verifica se os campos do formulário foram enviados
if (isset($_POST['email']) && isset($_POST['senha'])) {

    // 5. Cria uma instâcia da Classe LoginController
    $userLogin = new LoginController();

    // 6. Inseri os valore dos campos em seus respectivos métodos SET
    $userLogin->setEmail(htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'));
    $userLogin->setSenha(htmlspecialchars($_POST['senha'], ENT_QUOTES, 'UTF-8'));

    $status = $userLogin->login();

    /**  7. Verifica se NÃO há alguma chave de erro no array $status, se retorna verdadeiro
     * cria as variáveis de sessão e redireciona para à página home.
    **/
    if (!array_key_exists("erro", $status)) {

        $_SESSION['usuario_logado_id']     = $status['id'];
        $_SESSION['usuario_logado']        = $status['name'];
        $_SESSION['usuario_logado_email']  = $status['email'];
        $_SESSION['usuario_logado_status'] = $status['status'];
        $_SESSION['foto_de_perfil']        = $status['fotoPerfil'];
        $_SESSION['usuario_oline']         = $status['user_online'];

        
        header("Location: $APP_URL/home", true, 302);
        exit();
    }
}

include_once "includes/header.php";

?>

<style>
    form .field i.active::before {
        color: #333;
        content: '\f070';
    }
</style>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-lg-6 col-md-8 col-sm-10">
            <div class="card shadow-lg p-2 custom-card">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4 text-primary">Login</h2>

                    <?php if (array_key_exists("erro", $status)): ?>
                        <div  class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo $status['erro']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST">

                        <div class="mb-3 field">
                            <label for="email" class="form-label">Endereço de E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com">
                        </div>

                        <div class="mb-3 field">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Mínimo 8 caracteres">
                            <i class="fas fa-eye"></i>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                        </div>
                    </form>

                    <hr class="my-4">

                    <p class="text-center">Não tenho uma conta? <a href="<?php echo $APP_URL; ?>/cadastro" class="text-decoration-none">Criar conta</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../../resources/assets/js/eyeScriptLogin.js"></script>
<?php
include_once "includes/footer.php";
?>