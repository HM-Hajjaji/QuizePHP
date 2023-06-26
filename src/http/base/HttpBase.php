<?php

namespace App\http\base;

use App\http\Request;
use App\http\Response;

abstract class HttpBase
{
    protected static array $routes = [];
    protected Request $request;

    protected function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }

    public function path(string $name,array$params=[]):string|false
    {
        return self::$routes[$this->request->getMethod()][$name]["path"]??false;
    }
}