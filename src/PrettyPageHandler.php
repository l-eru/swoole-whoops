<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/5/28
 * Time: 9:22
 */

namespace L\SwooleWhoops;

use Swoole\Http\Response;
use Whoops\Handler\PrettyPageHandler as WhoopsPrettyPageHandler;

class PrettyPageHandler extends WhoopsPrettyPageHandler
{
    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
        parent::__construct();
    }

    public function handleUnconditionally($value = null)
    {
        return true;
    }

    public function handle()
    {
        ob_start();
        parent::handle();
        $this->response->end(ob_get_clean());
    }
}