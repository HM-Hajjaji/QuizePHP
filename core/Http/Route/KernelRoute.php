<?php

namespace Core\Http\Route;

use JetBrains\PhpStorm\NoReturn;
use ReflectionClass;
use ReflectionException;

abstract class KernelRoute
{
    protected static array $routes = [];

    /**
     * the function for handler list routes by method get or post
     * @param string $path
     * @param string $url
     * @param array|callable $action
     * @param string|array $method
     * @return void
     */
    protected function handler(string $path, string $url, array|callable $action, string|array $method):void
    {
        $path = trim($path);
        $url = trim($url);
        $url = !str_ends_with($url,"/") ? $url."/":$url;
        if (is_array($method))
        {
            if (isset($method[0]))
            {
                self::$routes[$method[0]][$path] = ['url' => trim($url),"action" => $action];
            }
            if (isset($method[1]))
            {
                self::$routes[$method[1]][$path] = ['url' => trim($url),"action" => $action];
            }
            return;
        }
        self::$routes[$method][$path] = ['url' => trim($url),"action" => $action];
    }

    /**
     * the function for use matchPath function and executeAction function or handler error if not find the url
     * @param string $method
     * @param string $url
     * @return void
     * @throws \Exception
     */
    #[NoReturn] protected function execute(string $method, string $url):void
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
        throw new \Exception("Page Not Found");
        /*response()->setStatusCode(404);
        response()->setContent('404 - Page Not Found');
        response()->send();*/
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

    protected function handleControllers(string $path):array
    {
        $controllers = [];
        $files = scandir($path);
        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $pathFile = sprintf("%s/%s", $path, $file);
            if (is_file($pathFile) && pathinfo($file, PATHINFO_EXTENSION) === "php") {
                $content = file_get_contents($pathFile);
                preg_match('/namespace\s+(.*?);/', $content, $namespaceMatches);
                preg_match('/class\s+(\w+)/', $content, $classNameMatches);
                if (isset($namespaceMatches[1]) && isset($classNameMatches[1])) {
                    $controllers[] = $namespaceMatches[1] . "\\" . $classNameMatches[1];
                }
            } elseif (is_dir($pathFile)) {
                foreach ($this->handleControllers($pathFile) as $class) {
                    $controllers[] = $class;
                }
            }
        }

        return $controllers;
    }

    protected function handleReflections():array
    {
        $reflections = [];
        foreach ($this->handleControllers(basePath()."/source/Controller") as $class)
        {
            try {
                $reflections[] = new ReflectionClass($class);
            } catch (ReflectionException $e) {
            }
        }
        return $reflections;
    }
}