<?php

namespace Core\Console\Service\Source\Support;

trait Action
{
    protected function generateAction(string $actionName,string $controllerName,array|string $methods = "GET"):string
    {
        return <<<ACTION
        {$this->generateRoute($actionName,$controllerName,$methods)}
            public function {$actionName}():Response
            {
                return \$this->view("{$this->generateActionPath($controllerName,$actionName)}",['controller' => '{$this->generateControllerName($controllerName)}']);
            }
        ACTION;
    }

    protected function generateRoute(string $actionName,string $controllerName,string|array $methods ="GET"): string
    {
        $path = sprintf("app_%s",str_replace("/","_",$this->generateActionPath($controllerName,$actionName)));
        if ($methods != "GET")
        {
            return <<<ROUTE
            #[Route("$path","/{$this->generateActionPath($controllerName,$actionName)}",[$methods])]
            ROUTE;
        }
        return <<<ROUTE
        #[Route("$path","/{$this->generateActionPath($controllerName,$actionName)}")]
        ROUTE;
    }

    protected function generateActionPath(string $controllerName,string $actionName):string
    {
        return strtolower(sprintf("%s/%s",substr($controllerName,0,-10),$actionName));
    }
}
