<?php

namespace App\Repository;

use App\Model\Quiz;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class QuizRepository extends EntityRepository
{
    public function __construct()
    {
        parent::__construct(entityManager(),entityManager()->getClassMetadata(Quiz::class));
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(Quiz $object):void
    {
        entityManager()->persist($object);
        entityManager()->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function remove(Quiz $object):void
    {
        entityManager()->remove($object);
        entityManager()->flush();
    }
}