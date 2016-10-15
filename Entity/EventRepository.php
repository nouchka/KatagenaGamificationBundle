<?php

namespace Katagena\GamificationBundle\Entity;

use Doctrine\ORM\EntityRepository;

class EventRepository extends EntityRepository
{
    public function findProgress($pid, $uId)
    {
        return $this->createQueryBuilder('sn')
            ->select('sum(sn.done)')
            ->addSelect('IDENTITY(sn.badge)')
            ->groupBy('sn.badge')
            ->getQuery()
            ->getResult();
    }
}
