<?php

namespace App\Repository;

use App\Entity\Prescritpion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Prescritpion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Prescritpion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Prescritpion[]    findAll()
 * @method Prescritpion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrescritpionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Prescritpion::class);
    }

    // /**
    //  * @return Prescritpion[] Returns an array of Prescritpion objects
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
    public function findOneBySomeField($value): ?Prescritpion
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
