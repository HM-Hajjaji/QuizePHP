<?php

namespace App;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Route;
use Dotenv\Dotenv;

class Core
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

    /**
     * the function for get object route
     * @return Route
     */
    public function getRoute(): Route
    {
        return $this->route;
    }
}