<?php

namespace App\Command;

use Core\Console\Command\Command;

class TestCommandInterface extends Command
{
    protected string $commandName = "app:test";

    public function execute(): void
    {
        $this->note("Command is running.");
        echo $this->commandName;
        $this->success("Command is success.");
    }
}