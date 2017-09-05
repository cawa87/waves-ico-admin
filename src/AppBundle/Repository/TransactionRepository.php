<?php

namespace AppBundle\Repository;

/**
 * TransactionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TransactionRepository extends \Doctrine\ORM\EntityRepository
{

    public function getInvested()
    {
        $qb = $this->createQueryBuilder('tr');
        $qb->select('SUM(tr.amount) as amount, cr.code, cr.id as currency');
        $qb->join('tr.currency', 'cr');
        $qb->where('tr.transactionType = :type');
        $qb->groupBy('cr.code');

        $qb->setParameter('type', 100);

        return $qb->getQuery()->getArrayResult();
    }

    public function getTotalBalance()
    {

    }
}
