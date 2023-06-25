<?php
namespace App\http;
use App\http\base\HttpBase;

class Route extends HttpBase
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request,$response);
    }


    public static function get(string $path,array|callable $action):void
    {
        self::$routes['get'][$path] = $action;
    }

    public static function post(string $path,array|callable $action):void
    {
        self::$routes['post'][$path] = $action;
    }

    public function resolve():void
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();

        $action = self::$routes[$method][$path]??false;
        if (!$action)
        {
            viewError(404);
        }
        else{
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