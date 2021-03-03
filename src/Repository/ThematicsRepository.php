<?php

namespace App\Repository;

use App\Entity\Thematics;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Thematics|null find($id, $lockMode = null, $lockVersion = null)
 * @method Thematics|null findOneBy(array $criteria, array $orderBy = null)
 * @method Thematics[]    findAll()
 * @method Thematics[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThematicsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thematics::class);
    }

    // /**
    //  * @return Thematics[] Returns an array of Thematics objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Thematics
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
