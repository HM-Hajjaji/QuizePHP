<?php

//using core helper functions
require_once dirname(__DIR__) . "/core/Helper/core.helper.php";
//autoload
require_once basePath()."/vendor/autoload.php";
//run core of project
try {
    core()->run(true);
} catch (\Doctrine\DBAL\Exception | \Doctrine\ORM\Exception\MissingMappingDriverImplementation $e) {
    throw new Exception($e->getMessage());
}