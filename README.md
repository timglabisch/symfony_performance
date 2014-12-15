# Symfony Micro Benchmarks

## Running
Just run:

    sudo apt-get install git docker python-pip && sudo pip install fig
    git clone https://github.com/timglabisch/symfony_performance
    sudo fig build
    sudo fig run --rm symfonyp composer install --prefer-source --no-interaction
    sudo fig run --rm symfonyp composer dump-autoload --optimize
    sudo fig run --rm symfonyp app/console generate:bundle
    sudo chmod -R 777 symfony/code/app/cache
    sudo chmod -R 777 symfony/code/app/logs
    sudo fig up


# Run the Benchmark

    ## Standard Symfony
    curl http://127.0.0.1:8080/standard.php
    ab -n 5000 -c 20 http://127.0.0.1:8080/standard.php

    ## Standard Symfony without Twig
    curl http://127.0.0.1:8080/standard.php/twigless
    ab -n 5000 -c 20 http://127.0.0.1:8080/standard.php/twigless

    ## Optimized
    curl http://127.0.0.1:8080/optimized.php
    ab -n 5000 -c 20 http://127.0.0.1:8080/optimized.php

    ## Optimized
    curl http://127.0.0.1:8080/optimized.php/twigless
    ab -n 5000 -c 20 http://127.0.0.1:8080/optimized.php/twigless



## Running on my System (AMD Phenom(tm) II X4 955 Processor, MemTotal: 16433348 kB) using Docker + Fig.

    symfony_performance git:(master) ✗ ab -n 5000 -c 20 http://127.0.0.1:8080/standard.php
    Requests per second:    328.84 [#/sec] (mean)
    Time per request:       60.821 [ms] (mean)
    Time per request:       3.041 [ms] (mean, across all concurrent requests)
    Transfer rate:          83.49 [Kbytes/sec] received


    ab -n 5000 -c 20 http://127.0.0.1:8080/standard.php/twigless
    Requests per second:    430.38 [#/sec] (mean)
    Time per request:       46.470 [ms] (mean)
    Time per request:       2.324 [ms] (mean, across all concurrent requests)
    Transfer rate:          108.44 [Kbytes/sec] received


    ab -n 5000 -c 20 http://127.0.0.1:8080/optimized.php
    Requests per second:    506.07 [#/sec] (mean)
    Time per request:       39.520 [ms] (mean)
    Time per request:       1.976 [ms] (mean, across all concurrent requests)
    Transfer rate:          128.49 [Kbytes/sec] received


    ab -n 5000 -c 20 http://127.0.0.1:8080/optimized.php/twigless
    Requests per second:    658.89 [#/sec] (mean)
    Time per request:       30.354 [ms] (mean)
    Time per request:       1.518 [ms] (mean, across all concurrent requests)
    Transfer rate:          166.01 [Kbytes/sec] received
