<?php

require_once './vendor/autoload.php';

use Ratchet\App;
use App\Websocket\Operation;

$app = new App('www.darkcrypt.com.br', 8089);
$app->route('/operation', new Operation(), ['*']);
$app->run();
