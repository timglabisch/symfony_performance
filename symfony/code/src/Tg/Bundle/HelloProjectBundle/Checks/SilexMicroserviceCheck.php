<?php

namespace Tg\Bundle\HelloProjectBundle\Checks;

use Tg\Bundle\HelloProjectBundle\CheckResult;
use Tg\Bundle\HelloProjectBundle\Checks\RedisCheck\PingRedisClient;

class SilexMicroserviceCheck implements CheckInterface {

    protected $ip;

    protected $port;

    const SERVICE_NAME = 'SilexMicroservice';

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    /**
     * @return static
     */
    public function check()
    {
        $context = new \ZMQContext();

        $requester = new \ZMQSocket($context, \ZMQ::SOCKET_REQ);
        $requester->connect('tcp://'.$this->ip.':'.$this->port);

        $requester->send("Hello");
        if ($requester->recv() !== "World") {
            return CheckResult::fail(static::SERVICE_NAME, 'Hello statement didnt returned as expected.');
        }

        return CheckResult::success(static::SERVICE_NAME);
    }

} 