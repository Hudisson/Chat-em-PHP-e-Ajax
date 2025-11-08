<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/src/router/router.php';

use App\core\Core;


# Carrega as variáveis da aplicação
$path = dirname(__FILE__, 1);
$dotenv = Dotenv\Dotenv::createUnsafeImmutable($path);
$dotenv->load();

# Inicializa à aplicação
$core = new Core();
$core->run($routes);