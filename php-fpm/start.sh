#!/bin/bash

sed -i "s@listen = /var/run/php5-fpm.sock@listen = 9000@" /etc/php5/fpm/pool.d/www.conf
echo "env[APP_SERVER_NAME] = ${APP_SERVER_NAME}" >> /etc/php5/fpm/pool.d/www.conf


if [ "$*" == "/bin/bash" ]; then
    exec /usr/sbin/php5-fpm --nodaemonize
else
    /bin/bash -l -c "$*"
fi