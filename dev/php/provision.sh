#!/bin/sh

cd /vagrant/dev/php


for cname in `docker ps --filter="name=ask-php" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = ask-php ]
    then
        docker stop $cname
        docker rm $cname
    fi
done

docker build -t ask/php .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name ask-php \
       --hostname ask-php \
       -p 80:80 \
       -v /vagrant:/vagrant \
       --link ask-mysql:ask-mysql \
       -e DESKTOP_NOTIFIER_SERVER_URL=http://192.168.88.1:12345 \
       ask/php

docker cp \
       /vagrant/dev/php/desktop-notifier-client \
       ask-php:/usr/bin/notify-send

docker exec ask-php /vagrant/dev/php/init-env.sh
