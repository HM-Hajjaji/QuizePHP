<?php
if (!function_exists("app"))
{
    function app():\App\Application
    {
        static $app = new \App\Application();
        return $app;
    }
}
if (!function_exists("env"))
{
    function env($key,$default = null)
    {
        return $_ENV[$key] ?? $default;
    }
}
if (!function_exists("basePath"))
{
    function basePath():string
    {
        return dirname(__DIR__);
    }
}

if (!function_exists("viewPath"))
{
    function viewPath():string
    {
        return basePath() . "/view/";
    }
}
if (!function_exists("viewError"))
{
    function viewError(int $code):void
    {
        switch ($code)
        {
            case 404:
                include_once viewPath()."error/404.php";
                break;
            case 500:
                include_once viewPath()."error/500.php";
                break;
        }
    }
}

if (!function_exists("schemaHttp"))
{
    function schemaHttp():string
    {
        $protocol = "http";
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
            $protocol = "https";
        }
        return sprintf("%s://%s/",$protocol,$_SERVER["HTTP_HOST"]);
    }
}

if (!function_exists("path"))
{
    function path(string $name = "app"):string
    {
        $path =  app()->getRoute()->path($name);
        if (!$path)
        {
            return "/";
        }
        return $path;
    }
}