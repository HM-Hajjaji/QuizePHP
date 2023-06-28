<?php

namespace App;

use App\Database\MySql;
use Core\Database\CoreDatabase;
use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Route;
use Dotenv\Dotenv;
use PDO;

class Core
{
    private Route $route;
    private CoreDatabase $database;

    public function __construct()
    {
        $this->route = new Route(new Request(),new Response());
    }

    public function run():void
    {
        Dotenv::createImmutable(basePath())->load();
        $this->database = new MySql("localhost",env("DB_NAME"), env("DB_USER","root"),env("DB_PASSWORD",""),[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
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

    /**
     * @return CoreDatabase
     */
    public function getDatabase(): CoreDatabase
    {
        return $this->database;
    }

}