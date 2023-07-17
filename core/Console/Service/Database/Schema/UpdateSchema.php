<?php

namespace Core\Console\Service\Database\Schema;

use Core\Console\Command\Command;
use Doctrine\ORM\Tools\SchemaTool;
use JetBrains\PhpStorm\NoReturn;

class UpdateSchema extends Command
{
    protected string $commandName = "db:schema:update";
    #[NoReturn] public function execute(): void
    {
        $this->note('Running update schema');
        (new SchemaTool(entityManager()))->updateSchema(entityManager()->getMetadataFactory()->getAllMetadata());
        $this->success("schema update successfully.");
    }
}