#!/bin/bash

echo "booting up silex"

if [ "$*" == "/bin/bash" ]; then
    echo "run silex php daemon"

    php /opt/silex/bin/index.php
else
    /bin/bash -l -c "$*"
fi

echo "$*"
echo "killed"
