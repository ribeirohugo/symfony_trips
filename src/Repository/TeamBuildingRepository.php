<?php namespace App\Repository;

use App\Entity\TeamBuilding;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TeamBuilding|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeamBuilding|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeamBuilding[]    findAll()
 * @method TeamBuilding[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeamBuildingRepository extends EntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeamBuilding::class);
    }
}
