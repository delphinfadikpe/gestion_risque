<?php

namespace App\Repository;

use App\Entity\BaleNiveau1;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BaleNiveau1>
 *
 * @method BaleNiveau1|null find($id, $lockMode = null, $lockVersion = null)
 * @method BaleNiveau1|null findOneBy(array $criteria, array $orderBy = null)
 * @method BaleNiveau1[]    findAll()
 * @method BaleNiveau1[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BaleNiveau1Repository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BaleNiveau1::class);
    }

    public function save(BaleNiveau1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(BaleNiveau1 $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return BaleNiveau1[] Returns an array of BaleNiveau1 objects
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

//    public function findOneBySomeField($value): ?BaleNiveau1
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
