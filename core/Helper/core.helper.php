<?php

use App\Core;
use Core\Component\Validator\Validator;
use Doctrine\ORM\EntityManager;

require_once "http.helper.php";
require_once "path.helper.php";
require_once "engine.helper.php";

//main function
if (!function_exists("kernel"))
{
    function core():Core
    {
        static $core = new Core();
        return $core;
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