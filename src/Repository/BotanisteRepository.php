<?php

namespace App\Repository;

use App\Entity\Botaniste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;

/**
 * @extends ServiceEntityRepository<Botaniste>
 *
 * @method Botaniste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Botaniste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Botaniste[]    findAll()
 * @method Botaniste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BotanisteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Botaniste::class);
    }

    public function save($entity, bool $flush = false): void
    {
        if (!$entity instanceof Botaniste){
            throw new Exception("Les paramètres doivent être des Botanistes.");
        }
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove($entity, bool $flush = false): void
    {
        if (!$entity instanceof Botaniste){
            throw new Exception("Les paramètres doivent être des Botanistes.");
        }
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Botaniste[] Returns an array of Botaniste objects
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

//    public function findOneBySomeField($value): ?Botaniste
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
