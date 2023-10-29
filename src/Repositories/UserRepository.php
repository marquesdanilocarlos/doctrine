<?php

namespace App\Repositories;

use App\Entities\User;
use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function getAllUsers(int $id)
    {
        $qb = $this->_em->createQueryBuilder();

        $qb->select('u')
            ->from(User::class, "u")
            ->where('u.id > :id')
            ->setParameter('id', $id);

        return $qb->getQuery()->getResult();
    }
}