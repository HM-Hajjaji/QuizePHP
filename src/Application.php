<?php

namespace App;

use App\database\Database;
use App\http\Request;
use App\http\Response;
use App\http\Route;
use Dotenv\Dotenv;

class Application
{
    private Route $route;
    private Database $database;

    public function __construct()
    {
        $this->route = new Route(new Request());
        $this->database = Database::handler();
    }

    public function run():void
    {
        Dotenv::createImmutable(basePath())->load();
        $this->database->connect();
        $this->route->resolve();
    }

    public function getRoute(): Route
    {
        return $this->route;
    }

    public function getDatabase(): Database
    {
        return $this->database;
    }

}