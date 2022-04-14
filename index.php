<?php

require_once './vendor/autoload.php';

$data = $_POST;

\Ratchet\Client\connect('ws://localhost:8080/operation')->then(function ($conn) use ($data) {
  $conn->send(json_encode($data));

  $conn->close();
}, function ($e) {
  echo "Could not connect: {$e->getMessage()}\n";
});
