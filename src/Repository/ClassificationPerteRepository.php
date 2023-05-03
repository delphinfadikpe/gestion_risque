<?php

namespace App\Repository;

use App\Entity\ClassificationPerte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClassificationPerte>
 *
 * @method ClassificationPerte|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassificationPerte|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassificationPerte[]    findAll()
 * @method ClassificationPerte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassificationPerteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassificationPerte::class);
    }

    public function save(ClassificationPerte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ClassificationPerte $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ClassificationPerte[] Returns an array of ClassificationPerte objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClassificationPerte
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
