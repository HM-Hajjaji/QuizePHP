<?php

namespace App\Repository;

use App\Model\Category;
use Doctrine\ORM\EntityRepository;

class CategoryRepository extends EntityRepository
{
    public function __construct()
    {
        parent::__construct(entityManager(),entityManager()->getClassMetadata(Category::class));
    }

    public function save(Category $object):void
    {
        entityManager()->persist($object);
        entityManager()->flush();
    }

    public function remove(Category $object):void
    {
        entityManager()->remove($object);
        entityManager()->flush();
    }
}