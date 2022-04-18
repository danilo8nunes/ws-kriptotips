<?php

require_once './vendor/autoload.php';

use Ratchet\App;
use App\Websocket\Operation;

$urlBase = ENVIRONMENT === 'prod' ? CONF_URL_BASE : CONF_URL_TEST;

$app = new App($urlBase, 443, '0.0.0.0');

$app->route('/operation', new Operation(), ['*']);

$app->run();
