<?php

namespace App\Repository;

use App\Model\Exam;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;

class ExamRepository extends EntityRepository
{
    public function __construct()
    {
        parent::__construct(entityManager(),entityManager()->getClassMetadata(Exam::class));
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function save(Exam $object):void
    {
        entityManager()->persist($object);
        entityManager()->flush();
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function remove(Exam $object):void
    {
        entityManager()->remove($object);
        entityManager()->flush();
    }
}