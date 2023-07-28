<?php
namespace Core\Component\Trigger;
use Core\Component\Validator\Validator;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;
use Doctrine\DBAL\Tools\DsnParser;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;
use Doctrine\ORM\ORMSetup;
use Dotenv\Dotenv;
use Http\Request;
use Http\Response;
use Route\Http\HttpRoute;

class Kernel
{
    protected ?string $projectDir = null;
    protected ?HttpRoute $httpRoute = null;
    protected ?EntityManager $entityManager = null;
    protected ?Validator $validator= null;
    protected ?Request $request= null;
    protected ?Response $response= null;

    protected function initialize(string $projectDir): static
    {
        $this->projectDir = $projectDir;
        $this->request = new Request();
        $this->response = new Response();
        $this->validator = new Validator();
        Dotenv::createImmutable($projectDir)->load();
        $this->entityManager = $this->handleEntityManager();
        $this->httpRoute= new HttpRoute(sprintf($projectDir."/%s","source/Controller"));
        $this->httpRoute->resolve();
        return $this;
    }

    /**
     * @throws MissingMappingDriverImplementation
     * @throws Exception
     */
    private function handleEntityManager():EntityManager
    {
        $config = ORMSetup::createAttributeMetadataConfiguration([$this->getProjectDir()."/source"],true);
        $connection = DriverManager::getConnection((new DsnParser(['mysql' => "mysqli"]))->parse(env("DATABASE_URL")));
        return new EntityManager($connection, $config);
    }

    /**
     * @return string
     */
    public function getProjectDir(): string
    {
        return $this->projectDir;
    }

    /**
     * @return HttpRoute
     */
    public function getHttpRoute(): HttpRoute
    {
        return $this->httpRoute;
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


}