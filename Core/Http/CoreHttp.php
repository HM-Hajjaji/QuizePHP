<?php
namespace Core\Http;
abstract class CoreHttp
{
    protected static array $routes = [];
    protected Request $request;
    protected Response $response;

    /**
     * @param Request $request
     * @param Response $response
     */
    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
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
     * the function for get url by name from list routes
     * @param string $name
     * @param array $params
     * @return string|false
     */
    public function path(string $name, array $params=[]):string|false
    {
//        dd(self::$routes[$this->request->getMethod()][$name]["path"]);
        return self::$routes[$this->request->getMethod()][$name]["url"]??false;
    }
}