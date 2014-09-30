#!/bin/bash

sed -i "s@listen = /var/run/php5-fpm.sock@listen = 9000@" /etc/php5/fpm/pool.d/www.conf

echo "env[APP_SERVER_NAME] = ${APP_SERVER_NAME}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__REDIS_PORT] = ${REDIS_1_PORT_6379_TCP_PORT}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__REDIS_ADDRESS] = ${REDIS_1_PORT_6379_TCP_ADDR}" >> /etc/php5/fpm/pool.d/www.conf

exec /usr/sbin/php5-fpm --nodaemonize
#/bin/bash
