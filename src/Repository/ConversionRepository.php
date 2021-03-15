<?php

namespace App\Repository;

use App\Entity\Conversion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Conversion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Conversion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Conversion[]    findAll()
 * @method Conversion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ConversionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Conversion::class);
    }
}
