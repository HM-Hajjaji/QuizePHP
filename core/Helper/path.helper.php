<?php

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