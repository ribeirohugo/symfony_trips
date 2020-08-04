<?php // tests/Repository/RegionRepositoryTest.php
namespace App\Tests\Repository;

use App\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class LocationRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSearchById()
    {
        $object = $this->entityManager
            ->getRepository(Location::class)
            ->find(1)
        ;

        $this->assertSame(1, $object->getId());
    }

    public function testSearchByName()
    {
        $object = $this->entityManager
            ->getRepository(Location::class)
            ->findOneBy(['name' => 'Porto'])
        ;

        $this->assertSame("Porto", $object->getName());
    }

    public function testSearchByRegion()
    {
        $object = $this->entityManager
            ->getRepository(Location::class)
            ->findOneBy(['name' => 'Porto'])
        ;

		$region = $object->getRegion();

        $this->assertSame("Porto", $region->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}