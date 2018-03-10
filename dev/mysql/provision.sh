#!/bin/sh

cd /vagrant/dev/mysql

data=false

for cname in `docker ps --filter="name=ask-mysql" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = ask-mysql ]
    then
        docker stop $cname
        docker rm $cname
    fi

    if [ "$cname" = ask-mysql-data ]
    then
        data=true
    fi
done

if [ "$data" = false ]
then
    docker run --name ask-mysql-data -v /var/lib/mysql busybox
fi

docker build -t ask/mysql .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name ask-mysql \
       --hostname ask-mysql \
       -p 3306:3306 \
       --volumes-from ask-mysql-data \
       -e MYSQL_DATABASE=ask \
       -e MYSQL_USER=ask \
       -e MYSQL_PASSWORD=ask \
       -e MYSQL_ALLOW_EMPTY_PASSWORD=yes \
       ask/mysql \
       --character-set-server=utf8 \
       --collation-server=utf8_unicode_ci
