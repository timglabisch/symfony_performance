<?php

namespace Tg\Bundle\HelloProjectBundle\Checks;

use Tg\Bundle\HelloProjectBundle\CheckResult;
use Tg\Bundle\HelloProjectBundle\Checks\RedisCheck\PingRedisClient;

class KafkaCheck implements CheckInterface {

    const API_METADATA_REQEST = 3;

    protected $ip;

    protected $port;

    const SERVICE_NAME = 'Kafka';

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    protected function msg($apikey = 2, $version = 0, $correlationId = 1, $clientId = -1, $type = self::API_METADATA_REQEST) {
        $data = pack('n', $type) .
                pack('n', $version).
                pack('N', $correlationId).
                pack('n', strlen('HELLO')) . 'HELLO'.
                pack('N', 1) . // one topic
                pack('n', strlen('HELLO')) . 'HELLO'
            ;

        return pack('N', strlen($data)) . $data;

    }

    public function check()
    {
        $stream = fsockopen($this->ip, $this->port);
        if(!fwrite($stream, $this->msg())) {
            return CheckResult::fail(static::SERVICE_NAME, 'Could not write to Kafka');
        }


        $null = null;
        $read = array($stream);

        if (@stream_select($read, $null, $null, 5) <= 0) {
            CheckResult::fail(static::SERVICE_NAME, 'Kafka Stream is not Readable');
        }

        $length = unpack('N', fread($stream, 4));
        $msg = fread($stream, $length[1]);

        if (strpos($msg, 'HELLO')) {
            return CheckResult::success(static::SERVICE_NAME);
        }

        return CheckResult::fail(static::SERVICE_NAME, 'Got wrong return msg');
    }

} 