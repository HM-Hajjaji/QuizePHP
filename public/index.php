<?php
//using core helper functions
require_once dirname(__DIR__) . "/core/Helper/CoreHelper.php";
//autoload
require_once basePath()."/vendor/autoload.php";
//system route
require_once basePath()."/route/web.php";
//run core of project
core()->run(true);