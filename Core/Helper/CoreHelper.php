<?php

use App\Core;

//main function
if (!function_exists("core"))
{
    /**
     * the function get one instance from object Core
     * @return Core
     */
    function core():Core
    {
        static $core = new Core();
        return $core;
    }
}

if (!function_exists("env"))
{
    /**
     * @param string $key key of value in file .env
     * @param string|null $default
     * @return mixed
     */
    function env(string $key, string $default = null):mixed
    {
        return $_ENV[$key] ?? $default;
    }
}

//function of paths folders
if (!function_exists("basePath"))
{
    /**
     * the function get main folder of project
     * @return string
     */
    function basePath():string
    {
        return dirname(__DIR__,2);
    }
}

if (!function_exists("viewPath"))
{
    /**
     * the function get main folder of views in project
     * @return string
     */
    function viewPath():string
    {
        return basePath() . "/view/";
    }
}

//function access to url
if (!function_exists("urlBase"))
{
    /**
     * the function get base url of project
     * @return string
     */
    function urlBase():string
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
    /**
     * the function get url by name from list routes
     * @param string $name the name of path in list routes
     * @return string
     */
    function path(string $name = "app"):string
    {
        $path =  core()->getRoute()->path($name);
        if (!$path)
        {
            return "/";
        }
        return $path;
    }
}