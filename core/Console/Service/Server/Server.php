<?php

namespace Core\Console\Service\Server;

use Core\Console\Command\Command;
use JetBrains\PhpStorm\NoReturn;

class Server extends Command
{
    protected string $commandName = "server:start";
    #[NoReturn] public function execute(): void
    {
        $this->note("running local server.");
        if (!exec("php -S localhost:8000 -t public/"))
        {
            $this->error("server not running.");
        }
    }
}