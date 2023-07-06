<?php

namespace App;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Route;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;
use Doctrine\ORM\EntityManager;

final class Core
{
    private Route $route;
    private EntityManager $entityManager;

    public function __construct()
    {
        $this->route = new Route(new Request(),new Response());
    }

    public function run():void
    {
        Dotenv::createImmutable(basePath())->load();
        $this->entityManager = $this->handleEntityManager();
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
     * @return EntityManager
     */
    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }


    private function handleEntityManager():EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration([basePath()."/Src"],true);
        $connection = DriverManager::getConnection([
            'driver'   => env("DB_DRIVER","pdo_mysql"),
            'user'     => env("DB_USERNAME","root"),
            'password' => env("DB_PASSWORD",""),
            'dbname'   => env("DB_NAME","db"),
        ], $config);
        return new EntityManager($connection, $config);
    }

}