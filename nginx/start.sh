#!/bin/bash

/bin/sed -i "s@<APP_SERVER_NAME>@${APP_SERVER_NAME}@" /etc/nginx/sites-enabled/default
/bin/sed -i "s@<FPM_HOST>@${FPM_1_PORT_9000_TCP_ADDR}@" /etc/nginx/sites-enabled/default
/bin/sed -i "s@<FPM_PORT>@${FPM_1_PORT_9000_TCP_PORT}@" /etc/nginx/sites-enabled/default

/usr/sbin/nginx
