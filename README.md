# mama

## Development

```
$ git clone

$ cd mama/dev
$ vagrant up
```

When the virtual machine is up successfully, access to http://localhost:8080.

### gulp

```
mama-php$ gulp
```

```
mama-php$ gulp watch
```

## SSHing to web server.

```
local$ cd dev
local$ vagrant ssh
mama$ docker exec -it mama-php /bin/bash
```

Source code is at /vagrant directory.


## SSHing to mysql server.

```
local$ cd dev
local$ vagrant ssh
mama$ docker exec -it mama-mysql /bin/bash
```
