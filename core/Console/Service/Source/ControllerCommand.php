<?php

namespace Core\Console\Service\Source;

use Core\Console\Command\Command;
use Core\Console\Service\Source\Support\Controller;
use JetBrains\PhpStorm\NoReturn;

class ControllerCommand extends Command
{
    use Controller;
    protected string $commandName = "app:controller";
    #[NoReturn] public function execute(): void
    {
        $this->note("create controller");
        $controllerName = readline($this->nb("Entre name of controller :"));

        if (!$this->createController($controllerName)) {
            $this->error("The controller already exists.");
        }

        $this->success("create controller successfully.");
    }
}