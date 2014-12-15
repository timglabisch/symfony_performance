<?php

namespace Tg\MicrobenchmarkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TwiglessController
{
    public function twiglessAction()
    {
        return new Response('Hello');
    }
}
