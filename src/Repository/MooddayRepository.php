<?php

namespace App\Repository;

use App\Entity\Moodday;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Moodday|null find($id, $lockMode = null, $lockVersion = null)
 * @method Moodday|null findOneBy(array $criteria, array $orderBy = null)
 * @method Moodday[]    findAll()
 * @method Moodday[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MooddayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Moodday::class);
    }

    // /**
    //  * @return Moodday[] Returns an array of Moodday objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Moodday
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
