<?php

namespace Core\Database;


abstract class CoreRepository
{
    protected CoreDatabase $database;

    public function __construct()
    {
        $this->database = core()->getDatabase();
    }

    abstract public function all();
    abstract public function find(int $id);
    abstract public function add(object $model);
    abstract public function update(object $model);
    abstract public function remove(object $model);
}