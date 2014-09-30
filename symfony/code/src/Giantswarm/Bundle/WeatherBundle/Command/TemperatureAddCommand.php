<?php

namespace Giantswarm\Bundle\WeatherBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Giantswarm\Bundle\WeatherBundle\Entity\Temperature;

class TemperatureAddCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('giantswarm:temperature:add')
            ->setDescription('Adds a temperature for a city')
            ->addArgument('city', InputArgument::REQUIRED, 'The city to add a temperature to')
            ->addArgument('celsius', InputArgument::REQUIRED, 'The celsius temperature to add');
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $city = $input->getArgument('city');
        $celsius = $input->getArgument('celsius');
        
        $temperature = new Temperature($city, $celsius);

        $this->getContainer()->get('giantswarm_weather.repository.weather')
            ->addTemperature($temperature);

        $output->writeln(sprintf("Added temperature %s for city %s", $temperature->getCelsius(), $temperature->getCity()));
    }
}
