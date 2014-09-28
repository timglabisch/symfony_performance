#Dockerized Symfony Project

A symfony project utilizing Docker based on PHP-FPM and nginx.

## Running

You can run the Docker environment using [fig](http://www.fig.sh/):

    $ fig up

You can run one-shot command inside the `symfony` service container:

    $ fig run --rm composer install
    $ fig run --rm php app/console cache:clear
