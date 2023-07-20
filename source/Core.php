<?php

namespace App;

use Core\Http\Request;
use Core\Http\Response;
use Core\Validation\Validator;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Tools\DsnParser;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;
use Route\Http\HttpRoute;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

final class Core
{
    private HttpRoute $route;
    private EntityManager $entityManager;
    private Validator $validator;
    private Request $request;
    private Response $response;
    private Run $whoops;

    /**
     * @throws \ReflectionException
     */
    public function __construct()
    {
        $this->route = new HttpRoute(basePath()."/source/Controller");
        $this->validator = new Validator();
        $this->request = Request::createFromGlobals();
        $this->response = new Response();
        $this->whoops = new Run();
    }

    /**
     * @throws MissingMappingDriverImplementation
     * @throws Exception
     * @throws \Exception
     */
    public function run():void
    {
        Dotenv::createImmutable(basePath())->load();
        $this->whoops->pushHandler(new PrettyPageHandler);
        $this->whoops->register();
        $this->entityManager = $this->handleEntityManager();
        $this->route->resolve();
    }

    /**
     * the function for get object route
     * @return HttpRoute
     */
    public function getRoute(): HttpRoute
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