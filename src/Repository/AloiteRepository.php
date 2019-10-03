<?php

namespace App\Repository;

use App\Entity\Aloite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Aloite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aloite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aloite[]    findAll()
 * @method Aloite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AloiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aloite::class);
    }

    // /**
    //  * @return Aloite[] Returns an array of Aloite objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aloite
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
