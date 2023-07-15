<?php

namespace Core\Console\Service\Database\Schema;

use Core\Console\Command\Command;
use Doctrine\ORM\Tools\SchemaTool;

class DropSchema extends Command
{
    protected string $commandName = "db:schema:drop";
    public function execute(): void
    {
        $this->note('Running drop schema');
        (new SchemaTool(entityManager()))->dropSchema(entityManager()->getMetadataFactory()->getAllMetadata());
        $this->success("schema drop successfully.");
    }
}