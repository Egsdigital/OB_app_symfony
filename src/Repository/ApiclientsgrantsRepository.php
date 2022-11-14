<?php

namespace App\Repository;

use App\Entity\Apiclientsgrants;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Apiclientsgrants>
 *
 * @method Apiclientsgrants|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apiclientsgrants|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apiclientsgrants[]    findAll()
 * @method Apiclientsgrants[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApiclientsgrantsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apiclientsgrants::class);
    }

    public function save(Apiclientsgrants $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Apiclientsgrants $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Apiclientsgrants[] Returns an array of Apiclientsgrants objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Apiclientsgrants
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
