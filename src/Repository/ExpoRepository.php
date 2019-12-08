<?php

namespace App\Repository;

use App\Entity\Expo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Expo|null find($id, $lockMode = null, $lockVersion = null)
 * @method Expo|null findOneBy(array $criteria, array $orderBy = null)
 * @method Expo[]    findAll()
 * @method Expo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Expo::class);
    }

    // /**
    //  * @return Expo[] Returns an array of Expo objects
    //  */

    public function findAfterNow()
    {
        $date = date('Y-m-d');
        dd($this->createQueryBuilder('e')
            ->andWhere("e.date >= $date")
            ->orderBy('e.id', 'ASC')
            ->getQuery());
        return $this->createQueryBuilder('e')
            ->andWhere("e.date >= $date")
            ->orderBy('e.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Expo
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
