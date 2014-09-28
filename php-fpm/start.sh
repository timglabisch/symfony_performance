#!/bin/bash

bin/sed -i "s@listen = /var/run/php5-fpm.sock@listen = 9000@" /etc/php5/fpm/pool.d/www.conf

/usr/sbin/php5-fpm --nodaemonize
