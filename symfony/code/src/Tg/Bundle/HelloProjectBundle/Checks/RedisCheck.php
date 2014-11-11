<?php

namespace Tg\Bundle\HelloProjectBundle\Checks;

use Tg\Bundle\HelloProjectBundle\CheckResult;
use Tg\Bundle\HelloProjectBundle\Checks\RedisCheck\PingRedisClient;

class RedisCheck implements CheckInterface {

    protected $ip;

    protected $port;

    const SERVICE_NAME = 'Redis';

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    public function check()
    {
        $redisPingClient = new PingRedisClient($this->ip, $this->port);

        if($redisPingClient->ping() == 'PONG') {
            return CheckResult::success(static::SERVICE_NAME);
        }

        return CheckResult::fail(static::SERVICE_NAME, 'PING statement didnt returned as expected.');
    }

} 