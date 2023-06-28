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
        self::$routes['get'][$path] = ['url' => $url,"action" => $action];
    }

    public function post(string $path,string $url,array|callable $action):void
    {
        self::$routes['post'][$path] = ['url' => $url,"action" => $action];
    }

    public function resolve():void
    {
        $method = $this->request->getMethod();
        $url = $this->request->getURL();
        $action = false;
        $paths = self::$routes[$method];
        foreach ($paths as $path)
        {
            if ($path['url'] == $url)
            {
                $action = $path['action'];
            }
        }
        if ($action)
        {
            switch ($action)
            {
                case is_callable($action):
                    $action();
                    break;
                case is_array($action):
                    call_user_func(array(new $action[0],$action[1]));
                    break;
            }
        }
    }
}