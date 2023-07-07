<?php

namespace App\Repository;

use App\Model\Quiz;
use Doctrine\ORM\EntityRepository;

class QuizRepository extends EntityRepository
{
    public function __construct()
    {
        parent::__construct(entityManager(),entityManager()->getClassMetadata(Quiz::class));
    }

    public function save(Quiz $object):void
    {
        entityManager()->persist($object);
        entityManager()->flush();
    }

    public function remove(Quiz $object):void
    {
        entityManager()->remove($object);
        entityManager()->flush();
    }
}