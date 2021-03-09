<?php

namespace App\Repository;

use App\Entity\Videos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Videos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Videos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Videos[]    findAll()
 * @method Videos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Videos::class);
    }

        /**
     * @return Article[] Returns an array of Article objects
     */
    public function findAllVideosWithContent()
    {
        $value = 1;
            $qb = $this->createQueryBuilder('v');
            $qb ->select('v', 'c', 'ct')
            ->join('v.content', 'c')
            ->join('c.thematics', 'ct')
            ->andWhere('c.published = :val')
            ->setParameter('val', $value)
            ->orderBy('c.publicationDate', 'ASC');
            $results = $qb->getQuery()->getResult();

            return $results;
    }

    // /**
    //  * @return Videos[] Returns an array of Videos objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Videos
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
