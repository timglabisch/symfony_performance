#!/bin/bash

sed -i "s@listen = /var/run/php5-fpm.sock@listen = 9000@" /etc/php5/fpm/pool.d/www.conf

echo "zend_extension=/usr/lib/php5/20121212/xdebug.so" >> /etc/php5/fpm/conf.d/xdebug.ini
echo "xdebug.max_nesting_level=100000" >> /etc/php5/fpm/conf.d/xdebug.ini
echo "xdebug.remote_enable=On" >> /etc/php5/fpm/conf.d/xdebug.ini
echo "xdebug.remote_connect_back=On" >> /etc/php5/fpm/conf.d/xdebug.ini

echo "env[APP_SERVER_NAME] = ${APP_SERVER_NAME}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__REDIS_PORT] = ${REDIS_PORT_6379_TCP_PORT}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__REDIS_ADDRESS] = ${REDIS_PORT_6379_TCP_ADDR}" >> /etc/php5/fpm/pool.d/www.conf

echo "env[SYMFONY__database_host] = ${MYSQL_PORT_3306_TCP_ADDR}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__database_port] = ${MYSQL_PORT_3306_TCP_PORT}" >> /etc/php5/fpm/pool.d/www.conf

echo "env[SYMFONY__elasticsearch_host] = ${ELASTICSEARCH_PORT_9200_TCP_ADDR}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__elasticsearch_port] = ${ELASTICSEARCH_PORT_9200_TCP_PORT}" >> /etc/php5/fpm/pool.d/www.conf

echo "env[SYMFONY__mongodb_host] = ${MONGODB_PORT_27017_TCP_ADDR}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__mongodb_port] = ${MONGODB_PORT_27017_TCP_PORT}" >> /etc/php5/fpm/pool.d/www.conf

echo "env[SYMFONY__postgres_host] = ${POSTGRES_PORT_5432_TCP_ADDR}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__postgres_port] = ${POSTGRES_PORT_5432_TCP_PORT}" >> /etc/php5/fpm/pool.d/www.conf

echo "env[SYMFONY__kafka_host] = ${KAFKA_PORT_9092_TCP_ADDR}" >> /etc/php5/fpm/pool.d/www.conf
echo "env[SYMFONY__kafka_port] = ${KAFKA_PORT_9092_TCP_PORT}" >> /etc/php5/fpm/pool.d/www.conf


if [ "$*" == "/bin/bash" ]; then
    exec /usr/sbin/php5-fpm --nodaemonize
else
    /bin/bash -l -c "$*"
fi