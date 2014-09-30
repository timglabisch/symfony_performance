<?php

namespace Giantswarm\Bundle\WeatherBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class WeatherController extends Controller
{
    /**
     * @Route("/{city}")
     * @Template()
     */
    public function indexAction($city)
    {
      $temperatures = $this->get('giantswarm_weather.repository.weather')
        ->getRecentTemperatures($city);

      return [
        'city'          => $city,
        'temperatures'  => $temperatures
      ];
    }
}
