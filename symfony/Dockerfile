FROM ubuntu:14.04

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y \
    git \
    curl \
    php5-cli \
    php5-json \
    php5-intl

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

ADD entrypoint.sh /entrypoint.sh
ADD . /var/www
ADD symfony_environment.sh /etc/profile.d/symfony_environment.sh

WORKDIR /var/www

#ENTRYPOINT /bin/sh -l -c "$*"
#CMD ["echo", "hello"]
ENTRYPOINT ["/entrypoint.sh"]
CMD ["echo", "hello"]
