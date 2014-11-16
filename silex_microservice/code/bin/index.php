<?php

echo "[silex_microservice] booting\n";

$context = new ZMQContext();

//  Socket to talk to clients
$responder = new ZMQSocket($context, ZMQ::SOCKET_REP);

$listen = "tcp://*:5560";
$responder->bind($listen);

while (true) {

    echo "[silex_microservice] wait for work.\n";

    $string = $responder->recv();
    printf ("[silex_microservice] Received request: [%s]%s\n", $string, PHP_EOL);

    //  Send reply back to client
    $responder->send("World");
}