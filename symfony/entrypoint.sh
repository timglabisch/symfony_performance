#!/bin/bash

exec rm -rf /var/www/app/cache/*
exec /bin/bash -l -c "$*"
