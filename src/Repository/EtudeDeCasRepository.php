<?php

namespace App\Repository;

use App\Entity\EtudeDeCas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EtudeDeCas>
 *
 * @method EtudeDeCas|null find($id, $lockMode = null, $lockVersion = null)
 * @method EtudeDeCas|null findOneBy(array $criteria, array $orderBy = null)
 * @method EtudeDeCas[]    findAll()
 * @method EtudeDeCas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtudeDeCasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EtudeDeCas::class);
    }

    public function save(EtudeDeCas $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EtudeDeCas $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EtudeDeCas[] Returns an array of EtudeDeCas objects
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

//    public function findOneBySomeField($value): ?EtudeDeCas
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
