<?php

use Core\Http\Request;
use Core\Http\Response;
use Route\Http\HttpRoute;

if (!function_exists("route"))
{
    function route():HttpRoute
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
     * @throws Exception
     */
    function path(string $name, array $params = []):string
    {
        return HttpRoute::path($name,$params);
    }
}