<?php

namespace Core\Database;


abstract class CoreRepository
{
    protected CoreDatabase $database;

    public function __construct()
    {
        $this->database = core()->getDatabase();
    }

    abstract public function all():array;
    abstract public function find(int $id):object;
    abstract public function add(object $model):bool;
    abstract public function update(object $model):bool;
    abstract public function remove(int $id):bool;
}