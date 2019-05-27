<?php

namespace App\Repository;

use App\Entity\Donation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\DoctrineExtensions\Query\Mysql;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @method Donation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Donation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Donation[]    findAll()
 * @method Donation[]    findAllDonations()
 * @method Donation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonationRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Donation::class);
    }

    // /**
    //  * @return Donation[] Returns an array of Donation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Donation
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findAllDonations($user)
    {
        return $this->createQueryBuilder('d')
        ->where("d.user = :user")
        ->setParameter('user', $user)
        ->innerJoin('App\Entity\Institution' ,'i', Join::WITH, 'd.institution = i.institutionId')
        ->getQuery()
        ->getResult();
    }
    

        /*
         Need a REST web service to provide information to external resources 
         (Surnames | Name | Email | ID document | Country | Department | Institution | Donation Amount | Date of Donation) 

         Ok, this is fun, I'm loving this challenge.
        */
    public function findDonations()
    {
        return $this->createQueryBuilder('d')
        ->select(array("p.firstName"))
        ->addSelect(array("p.lastName"))
        ->addSelect(array("p.email"))
        ->addSelect(array("p.idNumber"))
        ->addSelect(array("i"))
        ->addSelect(array("d.amount"))
        ->addselect(array("d.donationDate"))
        ->innerJoin('App\Entity\Institution' ,'i', Join::WITH, 'd.institution = i.institutionId')
        ->innerJoin('App\Entity\User' ,'u', Join::WITH, 'd.user = u.id')
        ->innerJoin('App\Entity\Person' ,'p', Join::WITH, 'p.email = u.username')
        ->getQuery()
        ->getResult();
    }

    public function findDonationsPerMonth($user)
    {
        $count = $this->createQueryBuilder('d')
        ->select('COUNT(d.donationId)')
        ->where('MONTH(d.donationDate) = :month')
        ->setParameter('month', date('m'))
        ->andWhere('YEAR(d.donationDate) = :year')
        ->setParameter('year', date('Y'))
        ->andWhere('u.isCountry = :true')
        ->setParameter('true', true)
        ->andWhere('u.id = :user')
        ->setParameter('user', $user)
        ->innerJoin('App\Entity\User' ,'u', Join::WITH, 'd.user = u.id')
        ->getQuery()
        ->getSingleScalarResult();
        return (int) $count;
    }

}
