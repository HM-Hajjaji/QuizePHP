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
     * @param string $path
     * @param array $params
     * @return string|false
     */
    public function path(string $path, array $params=[]):string|bool
    {
        $url = false;
        foreach (self::$routes as $method)
        {
            foreach (array_keys($method) as $pathName)
            {
                if ($pathName== $path)
                {
                    $url = $method[$path]["url"];
                    break 2;
                }
            }
        }
        if (!$url)
        {
            return false;
        }
        foreach (explode("/",$url) as $segment) {
            if (preg_match('/\{(\w+)\}/', $segment,$match))
            {
                $url = str_replace($match[0],$params[$match[1]],$url);
            }
        }
        return $url;
    }

    protected function handler(string $path,string $url,array|callable $action,string $method = "get"|"post"):void
    {
        $path = trim($path);$url = trim($url);
        $url = !str_ends_with($url,"/") ? $url .= "/":$url;
        self::$routes[$method][$path] = ['url' => trim($url),"action" => $action];
    }
}