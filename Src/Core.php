<?php

namespace App;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Route;
use Core\Template\Template;
use Core\Validation\Validator;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;
use Doctrine\ORM\EntityManager;

final class Core
{
    private Route $route;
    private EntityManager $entityManager;
    private Validator $validator;
    private Template $template;
    public function __construct()
    {
        $this->route = new Route(Request::createFromGlobals(),new Response());
        $this->validator = new Validator();
        $this->template = new Template();
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

    /**
     * @return Validator
     */
    public function getValidator(): Validator
    {
        return $this->validator;
    }

    /**
     * @return Template
     */
    public function getTemplate(): Template
    {
        return $this->template;
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