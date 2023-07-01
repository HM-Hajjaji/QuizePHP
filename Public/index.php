<?php
//using core helper functions
require_once dirname(__DIR__) . "/Core/Helper/CoreHelper.php";
//autoload
require_once basePath()."/vendor/autoload.php";
//system route
require_once basePath()."/Route/web.php";
//$myfn = function ($id,$name)
//{
//    dd($id,$name);
//};
//
//call_user_func_array($myfn,["id" => 12,"name" => "hamza"]);
//run core of project
core()->run();