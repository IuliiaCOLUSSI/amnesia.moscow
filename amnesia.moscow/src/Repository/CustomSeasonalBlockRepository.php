<?php

namespace App\Repository;

use App\Entity\CustomSeasonalBlock;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CustomSeasonalBlock|null find($id, $lockMode = null, $lockVersion = null)
 * @method CustomSeasonalBlock|null findOneBy(array $criteria, array $orderBy = null)
 * @method CustomSeasonalBlock[]    findAll()
 * @method CustomSeasonalBlock[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomSeasonalBlockRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CustomSeasonalBlock::class);
    }

    // /**
    //  * @return CustomSeasonalBlock[] Returns an array of CustomSeasonalBlock objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CustomSeasonalBlock
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
