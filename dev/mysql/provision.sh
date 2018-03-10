#!/bin/sh

cd /vagrant/dev/mysql

data=false

for cname in `docker ps --filter="name=mama-mysql" --format "{{.Names}}" -q -a`
do
    if [ "$cname" = mama-mysql ]
    then
        docker stop $cname
        docker rm $cname
    fi

    if [ "$cname" = mama-mysql-data ]
    then
        data=true
    fi
done

if [ "$data" = false ]
then
    docker run --name mama-mysql-data -v /var/lib/mysql busybox
fi

docker build -t mama/mysql .

docker run \
       -d \
       --restart=always \
       -v /etc/localtime:/etc/localtime:ro \
       --name mama-mysql \
       --hostname mama-mysql \
       -p 3306:3306 \
       --volumes-from mama-mysql-data \
       -e MYSQL_DATABASE=mama \
       -e MYSQL_USER=mama \
       -e MYSQL_PASSWORD=mama \
       -e MYSQL_ALLOW_EMPTY_PASSWORD=yes \
       mama/mysql \
       --character-set-server=utf8 \
       --collation-server=utf8_unicode_ci
