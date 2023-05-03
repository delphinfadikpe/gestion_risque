<?php

namespace App\Repository;

use App\Entity\EvaluationtPerte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EvaluationtPerte>
 *
 * @method EvaluationtPerte|null find($id, $lockMode = null, $lockVersion = null)
 * @method EvaluationtPerte|null findOneBy(array $criteria, array $orderBy = null)
 * @method EvaluationtPerte[]    findAll()
 * @method EvaluationtPerte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvaluationtPerteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EvaluationtPerte::class);
    }

    public function save(EvaluationtPerte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EvaluationtPerte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EvaluationtPerte[] Returns an array of EvaluationtPerte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EvaluationtPerte
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
