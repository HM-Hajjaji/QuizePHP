<?php

namespace App;

use App\http\Request;
use App\http\Response;
use App\http\Route;
use Dotenv\Dotenv;

class Application
{
    private Route $route;
    public function __construct()
    {
        $this->route = new Route(new Request(),new Response());
    }

    public function run():void
    {
        Dotenv::createImmutable(basePath())->load();
        $this->route->resolve();
    }
}