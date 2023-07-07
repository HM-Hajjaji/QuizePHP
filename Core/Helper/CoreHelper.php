<?php

use App\Core;
use Core\Http\Route;
use Core\Validation\Validator;
use Doctrine\ORM\EntityManager;

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

if (!function_exists("route"))
{
    function route():Route
    {
       return core()->getRoute();
    }
}

if (!function_exists("entityManager"))
{
    function entityManager():EntityManager
    {
        return core()->getEntityManager();
    }
}

if (!function_exists("validator"))
{
    function validator():Validator
    {
        return core()->getValidator();
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
        return basePath() . "/View/";
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
     * @param string $path the name of path in list routes
     * @param array $params
     * @return string
     */
    function path(string $path = "app",array $params = []):string
    {
        $url = route()->path($path,$params);
        if (!$url)
        {
            return "/";
        }
        return $url;
    }
}