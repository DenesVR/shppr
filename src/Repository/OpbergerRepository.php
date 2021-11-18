<?php

namespace App\Repository;

use App\Entity\Opberger;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Opberger|null find($id, $lockMode = null, $lockVersion = null)
 * @method Opberger|null findOneBy(array $criteria, array $orderBy = null)
 * @method Opberger[]    findAll()
 * @method Opberger[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OpbergerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Opberger::class);
    }

    // /**
    //  * @return Opberger[] Returns an array of Opberger objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Opberger
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
