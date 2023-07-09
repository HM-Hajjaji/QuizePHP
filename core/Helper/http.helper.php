<?php

use Core\Http\Request;
use Core\Http\Response;
use Core\Http\Route\CoreRoute;

if (!function_exists("route"))
{
    function route():CoreRoute
    {
        return core()->getRoute();
    }
}

if (!function_exists("request"))
{
    function request():Request
    {
        return core()->getRequest();
    }
}

if (!function_exists("response"))
{
    function response():Response
    {
        return core()->getResponse();
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