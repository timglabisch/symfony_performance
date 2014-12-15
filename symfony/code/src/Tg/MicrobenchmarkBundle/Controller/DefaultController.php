<?php

namespace Tg\MicrobenchmarkBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('TgMicrobenchmarkBundle:Default:index.html.twig');
    }
}
