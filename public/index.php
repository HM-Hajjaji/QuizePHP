<?php
//helpers functions
require_once dirname(__DIR__) . "/helper/helper.php";
//autoload
require_once basePath()."/vendor/autoload.php";
//system route
require_once basePath()."/route/web.php";
//run application
app()->run();