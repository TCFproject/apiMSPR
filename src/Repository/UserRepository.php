<?php

namespace App\Repository;

use App\Entity\User;
use App\Service\IUserService;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;


class UserRepository implements IUserRepository
{
    private $userRepository;
    private $em;
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->userRepository = $em->getRepository(User::class);
    }

    public function save(User $entity, bool $flush = false): void
    {
        /*$this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
            $this->UserRepository->flush();
        }*/
        $this->em->persist($entity);
        if ($flush) {
            $this->em->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        /*$this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
            $this->UserRepository->flush();
        }*/
        $this->em->remove($entity);
        if ($flush) {
            $this->em->flush();
        }
    }
    public function findAll()
    {
        // TODO: Implement findAll() method.
        return $this->userRepository->findAll();
    }

    public function find($id, $lockMode = null, $lockVersion = null)
    {
        // TODO: Implement find() method.
        return $this->userRepository->find($id);
    }

    public function findOneBy(array $criteria, array $orderBy = null)
    {
        // TODO: Implement findOneBy() method.
    }

    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        // TODO: Implement findBy() method.
    }
//    /**
//     * @return User[] Returns an array of User objects
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

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
