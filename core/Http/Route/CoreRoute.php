<?php

namespace Core\Http\Route;

use Core\Http\Route;

final class CoreRoute extends KernelRoute
{
    /**
     * the function for run result of url
     * @return void
     */
    public function resolve(bool $isResolve):void
    {
        if ($isResolve)
        {
            $this->execute(request()->getMethod(),request()->getPathInfo());
        }
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

    public function handleRoute():void
    {
        foreach ($this->handleReflections() as $reflection)
        {
            foreach ($reflection->getMethods() as $method)
            {
                if (isset($method->getAttributes()[0]))
                {
                    if ($method->getAttributes()[0]->getName() === Route::class)
                    {
                        /**
                         * @var Route $route
                         */
                        $route = $method->getAttributes()[0]->newInstance();
                        $this->handler($route->getName(),$route->getPath(),[$method->class,$method->name],$route->getMethod());
                    }
                }
            }
        }
    }
}