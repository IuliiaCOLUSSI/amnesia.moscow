<?php

namespace App\Repository;

use App\Entity\CatalogCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CatalogCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatalogCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatalogCategory[]    findAll()
 * @method CatalogCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatalogCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatalogCategory::class);
    }

    // /**
    //  * @return CatalogCategory[] Returns an array of CatalogCategory objects
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
    public function findOneBySomeField($value): ?CatalogCategory
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
