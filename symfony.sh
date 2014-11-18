#!/bin/bash

function_exists() {
    which $1 > /dev/null
    return $?
}

echo -e " \e[32m

  mmmm                  m''
 #'   ' m   m  mmmmm  mm#mm   mmm   m mm   m   m
 '#mmm  'm m'  # # #    #    #' '#  #'  #  'm m'
     '#  #m#   # # #    #    #   #  #   #   #m#
 'mmm#'  '#    # # #    #    '#m#'  #   #   '#
         m'                                 m'
        ''                                 ''
"

echo -e "\e[39m"

if ! function_exists git; then
    echo ""
    echo "install git first, using"
    echo -e "\e[31m$ sudo apt-get install -y git"
    echo ""
    exit
fi

if ! function_exists docker; then
    echo ""
    echo "install docker first, using"
    echo -e "\e[31m$ sudo apt-get install -y docker"
    echo ""
    exit
fi

if ! function_exists fig; then
    echo ""
    echo "install fig first, using"
    echo -e "\e[31m$ sudo apt-get install -y python-pip && sudo pip install fig"
    echo ""
    exit
fi

DIR="./"
if [ "$1" != "" ]; then
    DIR=$1
    mkdir -p $DIR && cd $DIR
fi

git clone https://github.com/timglabisch/symfony-docker-example ./ &&
sudo fig build &&
sudo fig run --rm symfony composer install --prefer-source --no-interaction &&
sudo chmod -R 777 symfony/code/app/cache &&
sudo chmod -R 777 symfony/code/app/logs &&
sudo fig run --rm symfony app/console generate:bundle &&
sudo chmod -R 777 symfony/code/app/cache &&
sudo chmod -R 777 symfony/code/app/logs &&
sudo fig up
