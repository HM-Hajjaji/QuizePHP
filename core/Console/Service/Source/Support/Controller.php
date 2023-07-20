<?php

namespace Core\Console\Service\Source\Support;

trait Controller
{
    use Action,View;

    public function createController(string $controllerName): bool|int
    {
        $pathController = sprintf("%s/%s.php",basePath()."/source/Controller",$this->generateControllerPath($controllerName));
        $pathView = sprintf("%s%s.php",viewPath(),$this->generateActionPath($this->generateControllerPath($controllerName),"index"));
        if (file_exists($pathController) || file_exists($pathView))
        {
            return false;
        }

        if (!is_dir(dirname($pathController)))
        {
            mkdir(directory: dirname($pathController),recursive: true);
        }

        if (!is_dir(dirname($pathView)))
        {
            mkdir(directory: dirname($pathView),recursive: true);
        }
        file_put_contents($pathController,$this->generateControllerContent($controllerName));
        file_put_contents($pathView,$this->generateViewContent());
        return true;
    }

    public function generateControllerContent(string $name): string
    {
        return
        <<<CONTROLLER
        <?php
        namespace {$this->generateNamespace($name)};\n
        use Core\Controller\CoreController;
        use Core\Http\Response;
        use Route\Route;\n
        class {$this->generateControllerName($name)} extends CoreController
        {
            {$this->generateAction("index",$this->generateControllerPath($name))}
        }
        CONTROLLER;
    }

    private function generateNamespace(string $name):string
    {
        $namespace = "App\Controller";
        if (str_contains($name,"/"))
        {
            $name = strrev($name);
            $name = explode("/",$name,2);
            if (count($name) > 1 && !empty($name[1]))
            {
                $namespace.="\\".str_replace("/","\\",strrev($name[1]));
            }
        }
        return $namespace;
    }

    private function generateControllerPath(string $controllerName):string
    {
        if (!str_ends_with($controllerName, "Controller")) {
            $controllerName .= "Controller";
        }
        return $controllerName;
    }
    public function generateControllerName(string $name):string
    {
        $name = $this->generateControllerPath($name);
        if (str_contains($name, "/")) {
            $nameParts = explode("/", $name);
            $name = end($nameParts);
        }
        return $name;
    }
}