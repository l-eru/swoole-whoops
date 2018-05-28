<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 12:56
 */

namespace L\SwooleWhoops;

use Swoole\Http\Response;
use Whoops\Run;

class Whoops
{
    static public function register(Response $response)
    {
        $run = new Run();
        $run->pushHandler(new PrettyPageHandler($response));
        $run->register();
    }
}