<?php

namespace App\Repository;

use App\Entity\BaleNiveau2;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BaleNiveau2>
 *
 * @method BaleNiveau2|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaleNiveau2|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaleNiveau2[]    findAll()
 * @method BaleNiveau2[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaleNiveau2Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaleNiveau2::class);
    }

    public function save(BaleNiveau2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BaleNiveau2 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BaleNiveau2[] Returns an array of BaleNiveau2 objects
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

//    public function findOneBySomeField($value): ?BaleNiveau2
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
