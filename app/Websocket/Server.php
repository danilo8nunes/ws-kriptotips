<?php

require_once './vendor/autoload.php';

use Ratchet\App;
use App\Websocket\Operation;

$url = ENVIRONMENT === 'prod' ? CONF_URL_BASE : CONF_URL_TEST;
$port =  ENVIRONMENT === 'prod' ? getenv('PORT') : CONF_PORT_TEST;
$ip =  ENVIRONMENT === 'prod' ? CONF_IP_BASE : CONF_IP_TEST;

$app = new App($url, $port, $ip);

$app->route('/operation', new Operation(), ['*']);

$app->run();
