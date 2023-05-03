<?php

namespace App\Repository;

use App\Entity\TypologieIrregularite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypologieIrregularite>
 *
 * @method TypologieIrregularite|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypologieIrregularite|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypologieIrregularite[]    findAll()
 * @method TypologieIrregularite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypologieIrregulariteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypologieIrregularite::class);
    }

    public function save(TypologieIrregularite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(TypologieIrregularite $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return TypologieIrregularite[] Returns an array of TypologieIrregularite objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypologieIrregularite
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
