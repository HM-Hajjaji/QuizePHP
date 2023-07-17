<?php

namespace Core\Console\Service\Source;

use Core\Console\Command\Command;
use JetBrains\PhpStorm\NoReturn;

class Controller extends Command
{
    protected string $commandName = "app:controller";
    #[NoReturn] public function execute(): void
    {
        $this->note("create controller");
        $controller = readline($this->nb("Entre name of controller :"));
        $directoryBase = basePath()."/source/Controller/";

        if (!str_ends_with("Controller",$controller))
        {
            $controller.="Controller";
        }
        $controller = $directoryBase."$controller.php";

        if (file_exists($controller))
        {
            $this->error("The controller already exists.");
        }
        $directoryController = dirname($controller);
        if (!is_dir($directoryController))
        {
            mkdir(directory: $directoryController,recursive: true);
        }

        $view = str_replace($directoryBase,viewPath(),strtolower(substr(str_replace($directoryBase,viewPath(),$controller),0,-14)))."/index.php";
        if (!file_exists($view))
        {
            $directoryView = dirname($view);
            if (!is_dir($directoryView))
            {
                mkdir(directory: $directoryView,recursive: true);
            }
        }

        file_put_contents($controller,$this->createController(pathinfo($controller,PATHINFO_FILENAME),$this->getNamespace($controller,$directoryBase),substr(str_replace(viewPath(),"",$view),0,-4)));
        file_put_contents($view,$this->createView(pathinfo($controller,PATHINFO_FILENAME)));

        $this->success("create controller successfully.");
    }

    private function createController(string $name,string $namespace,$viewPath): string
    {
        $path = str_replace("\\","_",strtolower($namespace))."_".strtolower(substr($name,0,-10));
        $path = str_replace("_controller","",$path);
        $url = str_replace("app","",str_replace("_","/",$path));
        return
        <<<Class
        <?php
        namespace $namespace;\n
        use Core\Controller\CoreController;
        use Core\Http\Response;
        use Core\Http\Route;\n
        class $name extends CoreController
        {
            #[Route("$path","$url")]
            public function index():Response
            {
                return \$this->view("$viewPath/index",['controller' => '$name',]);
            }
        }
        Class;
    }

    private function createView(string $name): string
    {
        return
        <<<View
        <?= inheritance("base")?>

        <?=block("title")?>$name<?=endBlock("title")?>
        
        <?=block("body")?>
            <h1>Welcom $name</h1>
        <?=endBlock("body")?>
        View;
    }

    private function getNamespace(string $file,string $directoryBase): string
    {
        $namespace = "App\Controller";
        $subNamespace = str_replace($directoryBase,"",pathinfo($file,PATHINFO_DIRNAME));
        if (ctype_alpha($subNamespace))
        {
            $namespace.="\\".str_replace("/","\\",$subNamespace);
        }
        return $namespace;
    }
}