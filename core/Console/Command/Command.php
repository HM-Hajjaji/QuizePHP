<?php

namespace Core\Console\Command;

abstract class Command implements CommandInterface
{
    protected string $commandName = "core";

    public function getName(): string
    {
        return $this->commandName;
    }

    protected function note(string $note): void
    {
        echo "\033[33m ## Note : $note ##\033[0m" . PHP_EOL;
    }

    protected function success(string $success): void
    {
        echo PHP_EOL . "\033[32m ## Command : $success ##\033[0m" . PHP_EOL;
    }

    protected function error(string $error): void
    {
        echo PHP_EOL . "\033[31m ## Error : $error ##\033[0m" . PHP_EOL;
        exit();
    }

    protected function nb(string $nb): string
    {
        return "\033[34m$nb\033[0m";
    }
}