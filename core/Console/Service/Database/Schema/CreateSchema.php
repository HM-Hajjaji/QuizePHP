<?php

namespace Core\Console\Service\Database\Schema;

use Core\Console\Command\Command;
use Doctrine\ORM\Tools\SchemaTool;
use Doctrine\ORM\Tools\ToolsException;
use JetBrains\PhpStorm\NoReturn;

class CreateSchema extends Command
{
    protected string $commandName = "db:schema:create";

    /**
     * @throws ToolsException
     */
    #[NoReturn] public function execute(): void
    {
        $this->note('Running create schema');
        (new SchemaTool(entityManager()))->createSchema(entityManager()->getMetadataFactory()->getAllMetadata());
        $this->success("schema create successfully.");
    }
}