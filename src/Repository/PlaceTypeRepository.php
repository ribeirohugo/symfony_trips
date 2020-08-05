<?php namespace App\Repository;

use App\Entity\PlaceType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PlaceType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlaceType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlaceType[]    findAll()
 * @method PlaceType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlaceTypeRepository extends EntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlaceType::class);
    }
}
