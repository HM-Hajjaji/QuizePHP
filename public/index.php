<?php
//autoload
require_once dirname(__DIR__)."/vendor/autoload.php";
//run core of project
try {
    core()->run(dirname(__DIR__));
} catch (Exception $e) {
    throw $e;
}
