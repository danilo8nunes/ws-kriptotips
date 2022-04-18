<?php

require_once './vendor/autoload.php';

use Ratchet\App;
use App\Websocket\Operation;

$url = ENVIRONMENT === 'prod' ? CONF_URL_BASE : CONF_URL_TEST;
$port =  ENVIRONMENT === 'prod' ? CONF_PORT_BASE : CONF_PORT_TEST;

$app = new App($url, $port);

$app->route('/operation', new Operation(), ['*']);

$app->run();
