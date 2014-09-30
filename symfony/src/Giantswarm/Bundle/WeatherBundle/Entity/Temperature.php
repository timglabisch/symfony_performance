<?php

namespace Giantswarm\Bundle\WeatherBundle\Entity;

class Temperature {
    
    private $city;

    private $celsius;

    public function __construct($city, $celsius) {
        $this->city = $city;
        $this->celsius = $celsius;
    }

    public function getCity() {
        return $this->city;
    }

    public function getCelsius() {
        return $this->celsius;
    }
}
