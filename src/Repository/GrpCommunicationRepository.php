<?php

namespace App\Repository;

use App\Entity\GrpCommunication;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<GrpCommunication>
 *
 * @method GrpCommunication|null find($id, $lockMode = null, $lockVersion = null)
 * @method GrpCommunication|null findOneBy(array $criteria, array $orderBy = null)
 * @method GrpCommunication[]    findAll()
 * @method GrpCommunication[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GrpCommunicationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GrpCommunication::class);
    }

//    /**
//     * @return GrpCommunication[] Returns an array of GrpCommunication objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?GrpCommunication
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
