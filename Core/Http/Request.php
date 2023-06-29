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

    public function setMethod(string $method = "GET"|"POST"):void
    {
        $_SERVER['REQUEST_METHOD'] = $method;
    }

    /**
     * the function for get url of request
     * @return string
     */
    public function getURL():string
    {
        return str_contains($_SERVER['REQUEST_URI'],"?") ? explode("?",$_SERVER['REQUEST_URI'])[0]:$_SERVER['REQUEST_URI'];
    }

    public function get(string $key = null,mixed $default = null):mixed
    {
        $value = $default;
        if (!is_null($key))
        {
            if ($this->getMethod() == "get")
            {
                $value = $_GET[$key]??$default;
            }
            elseif ($this->getMethod() == "post")
            {
                $value = $_POST[$key]??$default;
            }
        }
        else{
            if ($this->getMethod() == "get")
            {
                $value = $_GET;
            }
            elseif ($this->getMethod() == "post")
            {
                $value = $_POST;
            }
        }
        return $value;
    }
}