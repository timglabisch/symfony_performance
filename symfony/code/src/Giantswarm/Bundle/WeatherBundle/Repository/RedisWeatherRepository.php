<?php

namespace Giantswarm\Bundle\WeatherBundle\Repository;

use Predis\ClientInterface;
use Giantswarm\Bundle\WeatherBundle\Entity\Temperature;

class RedisWeatherRepository {

    private $client;

    public function __construct(ClientInterface $client) {
        $this->client = $client;
    }

    public function getRecentTemperatures($city, $limit = 10) {
        $temperatureData = $this->client->lrange('temperatures/' . $city, 0, $limit);

        $temperatures = [];
        foreach($temperatureData as $celsius) {
            $temperatures[] = new Temperature($city, $celsius);
        }

        return $temperatures;
    }

    public function addTemperature(Temperature $temperature) {
        $this->client->lpush('temperatures/' . $temperature->getCity(), [$temperature->getCelsius()]);
    }
}
