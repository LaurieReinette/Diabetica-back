<?php

namespace App\Repository;

use App\Entity\Bloodsugar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bloodsugar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bloodsugar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bloodsugar[]    findAll()
 * @method Bloodsugar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BloodsugarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bloodsugar::class);
    }

    // /**
    //  * @return Bloodsugar[] Returns an array of Bloodsugar objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bloodsugar
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
