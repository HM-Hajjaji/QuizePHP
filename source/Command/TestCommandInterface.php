<?php

namespace App\Command;

use Core\Console\Command\Command;
use JetBrains\PhpStorm\NoReturn;

class TestCommandInterface extends Command
{
    protected string $commandName = "app:test";

    #[NoReturn] public function execute(): void
    {
        $this->note("Command is running.");
        $m = readline("Entre Name :");
        echo $m;
        $this->success("Command is success.");
    }
}