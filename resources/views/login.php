<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../chat/resources/assets/css/style.css">
</head>
<body class="bg-light">

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-6 col-md-8 col-sm-10">
                <div class="card shadow-lg p-2 custom-card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 text-primary">Login</h2>
                        <form action="#" method="POST">
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Endereço de E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="nome@exemplo.com" required>
                            </div>

                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" placeholder="Mínimo 8 caracteres" required minlength="8">
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>