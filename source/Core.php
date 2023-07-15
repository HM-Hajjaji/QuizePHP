<?php

namespace App;

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Route\CoreRoute;
use Core\Validation\Validator;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Tools\DsnParser;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;

final class Core
{
    private CoreRoute $route;
    private EntityManager $entityManager;
    private Validator $validator;
    private Request $request;
    private Response $response;
    public function __construct()
    {
        $this->route = new CoreRoute();
        $this->validator = new Validator();
        $this->request = Request::createFromGlobals();
        $this->response = new Response();
    }

    /**
     * @throws MissingMappingDriverImplementation
     * @throws Exception
     */
    public function run(bool $isResolve):void
    {
        Dotenv::createImmutable(basePath())->load();
        $this->entityManager = $this->handleEntityManager();
        $this->route->handleRoute();
        $this->route->resolve($isResolve);
    }

    /**
     * the function for get object route
     * @return \Core\Http\Route\CoreRoute
     */
    public function getRoute(): CoreRoute
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
     * @return Request
     */
    public function getRequest(): Request
    {
        return $this->request;
    }

    /**
     * @return Response
     */
    public function getResponse(): Response
    {
        return $this->response;
    }

    /**
     * @throws MissingMappingDriverImplementation
     * @throws Exception
     */
    private function handleEntityManager():EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration([basePath()."/source"],true);
        $connection = DriverManager::getConnection((new DsnParser(['mysql' => "mysqli"]))->parse(env("DATABASE_URL")));
        return new EntityManager($connection, $config);
    }

}