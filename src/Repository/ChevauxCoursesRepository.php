<?php

namespace App\Repository;

use App\Entity\ChevauxCourses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ChevauxCourses>
 *
 * @method ChevauxCourses|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChevauxCourses|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChevauxCourses[]    findAll()
 * @method ChevauxCourses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChevauxCoursesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ChevauxCourses::class);
    }

    public function add(ChevauxCourses $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ChevauxCourses $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ChevauxCourses[] Returns an array of ChevauxCourses objects
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

//    public function findOneBySomeField($value): ?ChevauxCourses
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
