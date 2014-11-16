FROM ubuntu:14.04

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y \
    git \
    curl \
    php5-cli \
    php5-json \
    php5-intl \
    php5-dev \
    php5-xdebug \
    pkg-config \
    libzmq-dev && \
    apt-get autoremove -y && \
    pecl install --force zmq-beta && \
    echo "extension=zmq.so" > /etc/php5/cli/conf.d/zmq.ini

RUN echo 1
ADD xdebug.sh /bin/xdebug

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

ADD entrypoint.sh /entrypoint.sh
ADD environment.sh /etc/profile.d/environment.sh

WORKDIR /opt/silex
EXPOSE 5560

ENTRYPOINT ["/entrypoint.sh"]
