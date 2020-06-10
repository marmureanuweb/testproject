<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Customer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Customer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Customer[]    findAll()
 * @method Customer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    /**
     * @param int $limit
     * @param int $offset
     *
     * @return mixed
     */
    public function getEnabledCustomers(int $limit = 10, int $offset = 0)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.enabled = :e')
            ->setParameter('e', 1)
            ->orderBy('c.id', 'ASC')
            ->setFirstResult($offset)
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param int $id
     *
     * @return \App\Entity\Customer|null
     */
    public function getCustomerById(int $id):Customer
    {
         return $this->findOneBy(
            [
                'id' => $id,
                'enabled' => 1
            ]
        );
    }
}
