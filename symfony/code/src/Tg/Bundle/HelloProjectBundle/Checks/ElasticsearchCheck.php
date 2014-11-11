<?php

namespace Tg\Bundle\HelloProjectBundle\Checks;

use Tg\Bundle\HelloProjectBundle\CheckResult;
use Tg\Bundle\HelloProjectBundle\Checks\RedisCheck\PingRedisClient;

class ElasticsearchCheck implements CheckInterface {

    protected $ip;

    protected $port;

    const SERVICE_NAME = 'Elasticsearch';

    public function __construct($ip, $port)
    {
        $this->ip = $ip;
        $this->port = $port;
    }

    public function check()
    {
        $tuCurl = curl_init();
        curl_setopt($tuCurl, CURLOPT_URL, 'http://' . $this->ip . ':'. $this->port);
        curl_setopt($tuCurl, CURLOPT_VERBOSE, 0);
        curl_setopt($tuCurl, CURLOPT_HEADER, 0);
        curl_setopt($tuCurl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($tuCurl, CURLOPT_HTTPHEADER, array("Content-Type: application/json"));

        $data = curl_exec($tuCurl);
        if(curl_errno($tuCurl)) {
            return CheckResult::fail(static::SERVICE_NAME, 'request failed');
        }

        return CheckResult::success(static::SERVICE_NAME);
    }

} 