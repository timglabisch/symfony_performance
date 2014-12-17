<?php

use Symfony\Component\ClassLoader\ApcClassLoader;
use Symfony\Component\HttpFoundation\Request;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__ . '/../app/OptimizedAppKernelWithoutLoadingEverything.php';

$kernel = new OptimizedAppKernelWithoutLoadingEverything('optimized_just_framework', false);
$response = $kernel->handle(Request::createFromGlobals());
$response->send();

$kernel->terminate($request, $response);
