<?php namespace App\Tests\Repository;

use App\Entity\Location;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LocationRepositoryTest extends KernelTestCase
{
    private const LOCATION_NAME = "Porto";

    /**
     * @var EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchByName()
    {
        $object = $this->entityManager
            ->getRepository(Location::class)
            ->findOneBy(['name' => self::LOCATION_NAME])
        ;

        $this->assertSame(self::LOCATION_NAME, $object->getName());
    }

    public function testSearchByRegion()
    {
        $object = $this->entityManager
            ->getRepository(Location::class)
            ->findOneBy(['name' => self::LOCATION_NAME])
        ;

		$region = $object->getRegion();

        $this->assertSame(self::LOCATION_NAME, $region->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
