<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    // /**
    //  * @return User[] Returns an array of User objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    public function findIsCountry($user)
    {
        return (int) $this->createQueryBuilder('u')
        ->select('COUNT(u.isCountry)')
        ->where('u.id = :user')
        ->setParameter('user', $user)
        ->andWhere('u.isCountry = :true')
        ->setParameter('true', true)
        ->getQuery()
        ->getSingleScalarResult();
    }
    

    public function findFullName($email)
    {
        return $this->createQueryBuilder('u')
        ->select(array("p.firstName"))
        ->addSelect(array("p.lastName"))
        ->where('p.email = :email')
        ->setParameter('email', $email)
        ->innerJoin('App\Entity\Person' ,'p', Join::WITH, 'p.email = u.username')
        ->getQuery()
        ->getResult();
    }
    /*
    public function findOneBySomeField($value): ?User
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
