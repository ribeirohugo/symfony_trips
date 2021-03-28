<?php namespace App\Repository;

use App\Entity\CityTour;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CityTour|null find($id, $lockMode = null, $lockVersion = null)
 * @method CityTour|null findOneBy(array $criteria, array $orderBy = null)
 * @method CityTour[]    findAll()
 * @method CityTour[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CityTourRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CityTour::class);
    }
}
