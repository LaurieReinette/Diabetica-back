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

    public function getAllBloodsugarsOrderByDate($userId)
    {
        // on appelle le querybuilder
        $builder = $this->createQueryBuilder('bloodsugars');

        // on prépare la requête
        $builder->where('bloodsugars.user = :bloodsugarsUser');

        // on récupère les produits du user passé en paramètre
        $builder->setParameter('bloodsugarsUser', $userId);

        // on ordonne la réponse de façon ascendante de date
        $builder->orderBy('bloodsugars.date', 'ASC');

        // doctrine envoie la requête à la bdd
        $query = $builder->getQuery();
        
        // on retourne le résultat
        return $query->getResult();
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
