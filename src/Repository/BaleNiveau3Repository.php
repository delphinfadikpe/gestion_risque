<?php

namespace App\Repository;

use App\Entity\BaleNiveau3;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BaleNiveau3>
 *
 * @method BaleNiveau3|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaleNiveau3|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaleNiveau3[]    findAll()
 * @method BaleNiveau3[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaleNiveau3Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaleNiveau3::class);
    }

    public function save(BaleNiveau3 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BaleNiveau3 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BaleNiveau3[] Returns an array of BaleNiveau3 objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BaleNiveau3
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
