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
    php5-curl && \
    pecl install --force xhprof && \
    apt-get autoremove && \
    echo "extension=xhprof.so" > /etc/php5/fpm/conf.d/xhprof.ini

RUN echo 19

ADD start.sh /start.sh

EXPOSE 9000

WORKDIR /var/www

ENTRYPOINT ["/start.sh"]
