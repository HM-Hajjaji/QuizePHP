<?php

namespace App\Repository;

use App\Model\Category;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class CategoryRepository extends EntityRepository
{
    public function __construct()
    {
        parent::__construct(entityManager(),entityManager()->getClassMetadata(Category::class));
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(Category $object):void
    {
        entityManager()->persist($object);
        entityManager()->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function remove(Category $object):void
    {
        entityManager()->remove($object);
        entityManager()->flush();
    }
}