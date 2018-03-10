# ask

## Development

```
$ git clone

$ cd ask/dev
$ vagrant up
```

When the virtual machine is up successfully, access to http://localhost:8080.

### gulp

```
ask-php$ gulp
```

```
ask-php$ gulp watch
```

## SSHing to web server.

```
local$ cd dev
local$ vagrant ssh
ask$ docker exec -it ask-php /bin/bash
```

Source code is at /vagrant directory.


## SSHing to mysql server.

```
local$ cd dev
local$ vagrant ssh
ask$ docker exec -it ask-mysql /bin/bash
```
