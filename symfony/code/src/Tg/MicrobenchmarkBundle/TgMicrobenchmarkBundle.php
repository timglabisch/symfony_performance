<?php

namespace Tg\MicrobenchmarkBundle;

use Symfony\Component\Console\Application;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class TgMicrobenchmarkBundle extends Bundle
{

    public function getContainerExtension() {
        return false;
    }

    public function shutdown()
    {

    }

    public function getNamespace()
    {
        return __NAMESPACE__;
    }

    public function getPath()
    {
        return __DIR__;
    }

    public function getParent()
    {
       return null;
    }

    public function registerCommands(Application $application)
    {
        return;
    }

}
