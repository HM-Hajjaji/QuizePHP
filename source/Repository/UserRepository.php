<?php

namespace App\Repository;

use App\Model\User;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class UserRepository extends EntityRepository
{
    public function __construct()
    {
        parent::__construct(entityManager(),entityManager()->getClassMetadata(User::class));
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(User $object):void
    {
        entityManager()->persist($object);
        entityManager()->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function remove(User $object):void
    {
        entityManager()->remove($object);
        entityManager()->flush();
    }
}