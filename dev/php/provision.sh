#!/bin/sh

cd /vagrant/dev/php


for cname in `docker ps --filter="name=mama-php" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = mama-php ]
    then
        docker stop $cname
        docker rm $cname
    fi
done

docker build -t mama/php .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name mama-php \
       --hostname mama-php \
       -p 80:80 \
       -v /vagrant:/vagrant \
       --link mama-mysql:mama-mysql \
       -e DESKTOP_NOTIFIER_SERVER_URL=http://192.168.88.1:12345 \
       mama/php

docker cp \
       /vagrant/dev/php/desktop-notifier-client \
       mama-php:/usr/bin/notify-send

docker exec mama-php /vagrant/dev/php/init-env.sh
