<?php

namespace App\Repository;

use App\Entity\PlantingPeriod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlantingPeriod|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlantingPeriod|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlantingPeriod[]    findAll()
 * @method PlantingPeriod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlantingPeriodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlantingPeriod::class);
    }

    // /**
    //  * @return PlantingPeriod[] Returns an array of PlantingPeriod objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlantingPeriod
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
