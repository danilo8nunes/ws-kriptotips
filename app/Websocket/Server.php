<?php

require_once './vendor/autoload.php';

use Ratchet\App;
use App\Websocket\Operation;

$urlBase = ENVIRONMENT === 'prod' ? CONF_URL_BASE : CONF_URL_TEST;

$app = new App($urlBase, 443, '54.243.129.215');

$app->route('/operation', new Operation(), ['*']);

$app->run();
