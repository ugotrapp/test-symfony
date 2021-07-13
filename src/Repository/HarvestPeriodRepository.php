<?php

namespace App\Repository;

use App\Entity\HarvestPeriod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method HarvestPeriod|null find($id, $lockMode = null, $lockVersion = null)
 * @method HarvestPeriod|null findOneBy(array $criteria, array $orderBy = null)
 * @method HarvestPeriod[]    findAll()
 * @method HarvestPeriod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HarvestPeriodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, HarvestPeriod::class);
    }

    // /**
    //  * @return HarvestPeriod[] Returns an array of HarvestPeriod objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('h.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?HarvestPeriod
    {
        return $this->createQueryBuilder('h')
            ->andWhere('h.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
