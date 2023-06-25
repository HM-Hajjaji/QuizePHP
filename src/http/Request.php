<?php

namespace App\http;

class Request
{
    public function getMethod():string
    {
        return  strtolower($_SERVER['REQUEST_METHOD']);
    }
    public function getPath():string
    {
        return str_contains($_SERVER['REQUEST_URI'],"?") ? explode("?",$_SERVER['REQUEST_URI'])[0]:$_SERVER['REQUEST_URI'];
    }
}