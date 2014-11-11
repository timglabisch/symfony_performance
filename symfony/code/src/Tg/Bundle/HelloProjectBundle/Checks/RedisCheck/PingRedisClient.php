<?php

namespace Tg\Bundle\HelloProjectBundle\Checks\RedisCheck;

class PingRedisClient
{
    private $server;

    private $socket;

    public function __construct($ip, $port)
    {
        $this->server = $ip.':'.$port;
    }

    public function ping()
    {
        return $this->callMethod('PING', array());
    }

    private function callMethod($method, array $args)
    {
        array_unshift($args, $method);
        $cmd = '*' . count($args) . "\r\n";
        foreach ($args as $item) {
            $cmd .= '$' . strlen($item) . "\r\n" . $item . "\r\n";
        }
        fwrite($this->getSocket(), $cmd);
        return $this->parseResponse();
    }
    private function getSocket()
    {
        return $this->socket
            ? $this->socket
            : ($this->socket = stream_socket_client($this->server));
    }
    private function parseResponse()
    {
        $line = fgets($this->getSocket());
        list($type, $result) = array($line[0], substr($line, 1, strlen($line) - 3));
        if ($type == '-') { // error message
            throw new Exception($result);
        } elseif ($type == '$') { // bulk reply
            if ($result == -1) {
                $result = null;
            } else {
                $line = fread($this->getSocket(), $result + 2);
                $result = substr($line, 0, strlen($line) - 2);
            }
        } elseif ($type == '*') { // multi-bulk reply
            $count = ( int ) $result;
            for ($i = 0, $result = array(); $i < $count; $i++) {
                $result[] = $this->parseResponse();
            }
        }
        return $result;
    }
} 