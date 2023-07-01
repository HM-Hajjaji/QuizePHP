<?php

namespace Core\Http;

class Route extends CoreHttp
{
    public function __construct(Request $request,Response $response)
    {
        parent::__construct($request,$response);
    }

    public function get(string $path,string $url,array|callable $action):void
    {

        $this->handler($path,$url,$action,"get");
    }

    public function post(string $path,string $url,array|callable $action):void
    {
        $this->handler($path,$url,$action,"post");
    }

    public function resolve():void
    {
        $this->execute($this->request->getMethod(),$this->request->getURL());
    }

    private function execute(string $method,string $url):void
    {
        $routes = self::$routes[$method] ?? [];
        $url = !str_ends_with($url,"/") ? $url .= "/":$url;
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
        $this->response->render();
    }

    private function matchPath(string $pattern,string $url):bool|array
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

    private function executeAction(callable|array $action,array|null $params):void
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