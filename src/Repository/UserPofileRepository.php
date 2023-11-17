<?php

namespace App\Repository;

use App\Entity\UserPofile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<UserPofile>
 *
 * @method UserPofile|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserPofile|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserPofile[]    findAll()
 * @method UserPofile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserPofileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserPofile::class);
    }

//    /**
//     * @return UserPofile[] Returns an array of UserPofile objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?UserPofile
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
