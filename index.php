<?php

require_once __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/src/router/router.php';

use App\core\Core;

$core = new Core();
$core->run($routes);