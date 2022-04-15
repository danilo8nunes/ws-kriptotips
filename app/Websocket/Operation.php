<?php

namespace App\Websocket;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Operation implements MessageComponentInterface
{
  protected $clients;

  public function __construct()
  {
    $this->clients = new \SplObjectStorage;
  }

  public function onOpen(ConnectionInterface $conn)
  {
    $this->clients->attach($conn);
  }

  public function onMessage(ConnectionInterface $from, $msg)
  {
    $data = json_decode($msg);

    var_dump($data);

    if (!empty($data->operation)) {
      foreach ($this->clients as $client) {
        if ($from != $client) {
          $client->send(json_encode($msg));
        }
      }
    } else {
      $from->send(json_encode(['error' => 'Invalid message sent to this channel']));
    }
  }

  public function onClose(ConnectionInterface $conn)
  {
    $this->clients->detach($conn);
  }

  public function onError(ConnectionInterface $conn, \Exception $e)
  {
    $conn->close();
  }
}
