<?php

namespace App\Repository;

use App\Entity\EtatPretSystem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtatPretSystem>
 *
 * @method EtatPretSystem|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtatPretSystem|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtatPretSystem[]    findAll()
 * @method EtatPretSystem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatPretSystemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtatPretSystem::class);
    }

    public function save(EtatPretSystem $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EtatPretSystem $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EtatPretSystem[] Returns an array of EtatPretSystem objects
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

//    public function findOneBySomeField($value): ?EtatPretSystem
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
