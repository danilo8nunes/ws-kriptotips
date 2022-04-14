<?php

require_once './vendor/autoload.php';

use Ratchet\App;
use App\Websocket\Operation;

$app = new App('localhost', 8080);
$app->route('/operation', new Operation(), ['*']);
$app->run();
