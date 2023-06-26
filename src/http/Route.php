<?php
namespace App\http;
use App\http\base\HttpBase;

class Route extends HttpBase
{
    public function __construct(Request $request)
    {
        parent::__construct($request);
    }

    public static function get(string $name,string $path,array|callable $action):void
    {
        self::$routes['get'][$name] = ['path' => $path,"action" => $action];
    }

    public static function post(string $name,string $path,array|callable $action):void
    {
        self::$routes['post'][$name] = ['path' => $path,"action" => $action];
    }

    public function resolve():void
    {
        $method = $this->request->getMethod();
        $path = $this->request->getPath();
        $action = false;
        $list= self::$routes[$method];
        foreach ($list as $name => $value)
        {
            if ($value['path'] == $path)
            {
                $action = $value['action'];
            }
        }
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