<?php
session_start();

session_unset();

// 1. Destroi os cookie de sessão 
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 2.  Destrói a sessão
session_destroy();

// 3. Redireciona para à página de login
header("Location: $APP_URL");
exit();