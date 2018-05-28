Documents
======================

1. require library using composer:

```composer
# composer.json
"require": {
        "l-eru/swoole-whoops": "^0"
},
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/l-eru/swoole-whoops"
    }
]
```




2. It is easy to use, just like following:

```php
<?php

use Swoole\Http\Server;
use Swoole\Http\Request;
use Swoole\Http\Response;

$server = new Server('0.0.0.0', 9501);

// require composer library
$server->on('workerStart', function () {
    require __DIR__ . '/vendor/autoload.php';
});

// listen the request event
$server->on('request', function (Request $request, Response $response) {
    /**
     * register the swoole-whoops 
     */
    \L\SwooleWhoops\Whoops::register($response);
});

$server->start();
```