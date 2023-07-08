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
     * the function for get url by path from list routes
     * @param string $path
     * @param array $params
     * @return string|false
     */
    public function path(string $path, array $params=[]):string|bool
    {
        foreach (self::$routes as $method) {
            foreach (array_keys($method) as $pathName) {
                if ($pathName == $path) {
                    $url = $method[$path]["url"];
                    foreach (explode("/", $url) as $segment) {
                        if (preg_match('/\{(\w+)\}/', $segment, $match)) {
                            $url = str_replace($match[0], $params[$match[1]], $url);
                        }
                    }
                    return $url;
                }
            }
        }
        return false;
    }

    /**
     * the function for handler list routes by method get or post
     * @param string $path
     * @param string $url
     * @param array|callable $action
     * @param string $method
     * @return void
     */
    protected function handler(string $path, string $url, array|callable $action, string $method = "GET"|"POST"):void
    {
        $path = trim($path);
        $url = trim($url);
        $url = !str_ends_with($url,"/") ? $url."/":$url;
        self::$routes[$method][$path] = ['url' => trim($url),"action" => $action];
    }

    /**
     * the function for use matchPath function and executeAction function or handler error if not find the url
     * @param string $method
     * @param string $url
     * @return void
     */
    protected function execute(string $method, string $url):void
    {
        $routes = self::$routes[$method] ?? [];
        $url = !str_ends_with($url,"/") ? $url."/":$url;
        foreach ($routes as $route)
        {
            $params = $this->matchPath($route['url'],$url);
            if (is_array($params))
            {
                $this->executeAction($route['action'],$params);
                return;
            }
        }
        $this->response->setStatusCode(404);
        $this->response->setContent('404 - Page Not Found');
        $this->response->send();
    }

    /**
     * the function for check the url from request is match with url from list routes and check is has parameters with returned
     * @param string $pattern
     * @param string $url
     * @return bool|array
     */
    protected function matchPath(string $pattern, string $url):bool|array
    {
        $params = [];
        $patternSegments = explode('/', $pattern);
        $urlSegments = explode('/', $url);
        if (count($patternSegments) !== count($urlSegments)) {
            return false;
        }
        foreach ($patternSegments as $index => $segment) {
            if (preg_match('/\{(\w+)\}/', $segment,$match))
            {
                $pattern = str_replace($match[0],$urlSegments[$index],$pattern);
                $params[$match[1]] = $urlSegments[$index];
            }
        }
        if ($pattern !== $url)
        {
            return false;
        }
        return $params;
    }

    /**
     * the function call action of url with pass parameters of action
     * @param callable|array $action
     * @param array $params
     * @return void
     */
    protected function executeAction(callable|array $action, array $params):void
    {
        switch ($action)
        {
            case is_callable($action):
                call_user_func_array($action,$params);
                break;
            case is_array($action):
                call_user_func_array(array(new $action[0],$action[1]),$params);
                break;
        }
    }
}