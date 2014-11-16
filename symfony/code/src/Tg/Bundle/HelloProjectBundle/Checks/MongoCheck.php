<?php

namespace Tg\Bundle\HelloProjectBundle\Checks;

use Tg\Bundle\HelloProjectBundle\CheckResult;
use Tg\Bundle\HelloProjectBundle\Checks\RedisCheck\PingRedisClient;

class MongoCheck implements CheckInterface {

    protected $ip;

    protected $port;

    const SERVICE_NAME = 'Mongo';

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    public function check()
    {
        $mongodb = new \MongoDB(new \Mongo('mongodb://'.$this->ip.':'.$this->port), 'mongo');

        if($mongodb->command(array('ping' => 1)) == array('ok' => 1)) {
            return CheckResult::success(static::SERVICE_NAME);
        }

        return CheckResult::fail(static::SERVICE_NAME, 'PING statement didnt returned as expected.');
    }

} 