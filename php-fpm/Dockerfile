FROM ubuntu:14.04

ENV DEBIAN_FRONTEND noninteractive

RUN apt-get update && apt-get install -y \
    php5-fpm \
    php5-json \
    php5-intl 

#RUN echo "daemonize = no" > /etc/php5/fpm/pool.d/daemonize.conf

ADD start.sh /start.sh

EXPOSE 9000

ENTRYPOINT ["/start.sh"]
