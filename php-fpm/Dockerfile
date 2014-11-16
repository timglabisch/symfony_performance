FROM ubuntu:14.04

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y \
    php5-dev \
    php5-cli \
    php5-fpm \
    php5-json \
    php5-mysql \
    php5-intl \
    php5-xdebug \
    php5-mongo \
    php5-pgsql \
    php5-curl \
    pkg-config \
    libzmq-dev && \
    apt-get autoremove && \
    pecl install --force xhprof && \
    echo "extension=xhprof.so" > /etc/php5/fpm/conf.d/xhprof.ini && \
    pecl install --force zmq-beta && \
    echo "extension=zmq.so" > /etc/php5/fpm/conf.d/zmq.ini


RUN echo 21

ADD start.sh /start.sh

EXPOSE 9000

WORKDIR /var/www

ENTRYPOINT ["/start.sh"]
