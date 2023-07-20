<?php

namespace Core\Console;

use Core\Console\Command\CommandInterface;
use Doctrine\DBAL\Exception;
use Doctrine\ORM\Exception\MissingMappingDriverImplementation;

class Console
{
    private array $commands=[];

    public function __construct()
    {
        $this->resolve();
    }

    public function run(int $count,array $arguments): void
    {
        array_shift($arguments);
        if (isset($arguments[0]))
        {
            $command = $this->getCommand($arguments[0]);
            if ($command)
            {
                $command->execute();
            }
            else{
                echo "\033[31m ## Error : Command not found! ##\033[0m" . PHP_EOL;
            }
        }
    }

    public function getCommand(string $name):CommandInterface|false
    {
        return $this->commands[$name]??false;
    }

    private function add(CommandInterface $command): void
    {
        $this->commands[$command->getName()] = $command;
    }

    private function handleCommands(string $path):array
    {
        $commands = [];
        $files = scandir($path);

        foreach ($files as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $pathFile = sprintf("%s/%s", $path, $file);
            if (is_file($pathFile) && pathinfo($file, PATHINFO_EXTENSION) === "php") {
                $content = file_get_contents($pathFile);
                preg_match('/namespace\s+(.*?);/', $content, $namespaceMatches);
                preg_match('/class\s+(\w+)/', $content, $classNameMatches);
                if (isset($namespaceMatches[1]) && isset($classNameMatches[1])) {
                    $commands[] = $namespaceMatches[1] . "\\" . $classNameMatches[1];
                }
            } elseif (is_dir($pathFile)) {
                foreach ($this->handleCommands($pathFile) as $class) {
                    $commands[] = $class;
                }
            }
        }
        return $commands;
    }

    private function resolve(): void
    {
        $commands = array_merge($this->handleCommands(basePath()."/source/Command"),$this->handleCommands(basePath()."/core/Console/Service"));
        foreach ($commands as $command)
        {
            $this->add(new $command);
        }
    }
}