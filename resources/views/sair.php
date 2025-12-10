<?php

use App\service\LoginService;

session_start();

# 1 Atualiza de online para offline no banco de dados
$user_oline = LoginService::sair(['online' => 'offline', 'id' => $_SESSION['usuario_logado_id']]);

session_unset();

// 2. Destroi os cookie de sessão 
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// 3.  Destrói a sessão
session_destroy();

// 4. Redireciona para à página de login
header("Location: $APP_URL");
exit();
