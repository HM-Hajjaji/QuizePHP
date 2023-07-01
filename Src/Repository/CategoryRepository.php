<?php

namespace App\Repository;

use App\model\Category;
use Core\Database\CoreRepository;
use PDO;

class CategoryRepository extends CoreRepository
{
    private string $tableName = "category";
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
        $categorys = $statement->fetchAll();
        $list = [];
        foreach ($categorys as $category)
        {
            $object = new Category();
            $object->setId($category->id);
            $object->setTitle($category->title);
            $object->setCreatedAt(new \DateTimeImmutable($category->createdAt));
            $list[] = $object;
        }
        return $list;
    }

    public function find(int $id)
    {
        $query = "SELECT * FROM $this->tableName WHERE id=:id";
        $statement =$this->pdo->prepare($query);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $model = $statement->fetch();
    }

    public function add(object $model):bool
    {
        /**
         * @var Category $model
         */
        $query = "INSERT INTO $this->tableName (title,createdAt) VALUES(:title,:createdAt)";
        $statement =$this->pdo->prepare($query);
        $statement->bindValue(":title",$model->getTitle());
        $statement->bindValue(":createdAt",$model->getCreatedAt()->format('Y-m-d H:i'));
        return $statement->execute();
    }

    public function update(object $model)
    {
        // TODO: Implement update() method.
    }

    public function remove(int $id):bool
    {
        $query = "DELETE FROM $this->tableName WHERE id=:id";
        $statement =$this->pdo->prepare($query);
        $statement->bindValue(":id",$id);
        return $statement->execute();
    }
}