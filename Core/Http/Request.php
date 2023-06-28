<?php

namespace Core\Http;

class Request
{
    private ?array $data = null;


    /**
     * the function for get method of send data
     * @return string
     */
    public function getMethod():string
    {
        return  strtolower($_SERVER['REQUEST_METHOD']);
    }


    /**
     * the function for get url of request
     * @return string
     */
    public function getURL():string
    {
        return str_contains($_SERVER['REQUEST_URI'],"?") ? explode("?",$_SERVER['REQUEST_URI'])[0]:$_SERVER['REQUEST_URI'];
    }
}