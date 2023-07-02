<?php

namespace App\Repository;

use App\Model\User;
use Core\Database\CoreRepository;
use PDO;

class UserRepository extends CoreRepository
{
    private string $tableName = "user";
    private PDO $pdo;
    public function __construct()
    {
        parent::__construct();
        $this->pdo = $this->database->getPDO();
    }

    public function all():array
    {
        $query = "SELECT * FROM $this->tableName";
        $statement =$this->pdo->prepare($query);
        $statement->execute();
        $users = $statement->fetchAll();
        $list = [];
        foreach ($users as $user)
        {
            $object= new User(id: $user->id,name: $user->name,username: $user->username,password: $user->password,types: explode(" ",$user->types),createdAt: new \DateTimeImmutable($user->createdAt));
            $list[] = $object;
        }
        return $list;
    }

    public function find(int $id)
    {
        // TODO: Implement find() method.
    }

    public function add(object $object)
    {
        // TODO: Implement add() method.
    }

    public function update(object $object)
    {
        // TODO: Implement update() method.
    }

    public function remove(object $object)
    {
        // TODO: Implement remove() method.
    }
}