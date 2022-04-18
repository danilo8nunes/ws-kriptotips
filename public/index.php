<?php

require_once './vendor/autoload.php';

$data = $_POST;

if (!empty($data['app_token']) && $data['app_token'] === APP_TOKEN) {

  $urlBase = ENVIRONMENT === 'prod' ? CONF_URL_BASE : CONF_URL_TEST;

  unset($data['app_token']);

  \Ratchet\Client\connect('ws://' . $urlBase . ':8080/operation')->then(function ($conn) use ($data) {
    $conn->send(json_encode($data));

    $conn->close();
  }, function ($e) {
    echo "Could not connect: {$e->getMessage()}\n";
  });

  if (!empty($data['operation'])) {
    echo json_encode([
      'success' => 'operation sent',
      'operation' => $data['operation']
    ]);
  }
} elseif (empty($data)) {
  return '../view.html';
} else {
  echo json_encode([
    'error' => 'invalid token',
  ]);
}
