<?php // tests/Repository/RegionRepositoryTest.php
namespace App\Tests\Repository;

use App\Entity\Place;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PlaceRepositoryTest extends KernelTestCase
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
            ->getRepository(Place::class)
            ->find(1)
        ;

        $this->assertSame(1, $object->getId());
    }

    public function testSearchByName()
    {
        $object = $this->entityManager
            ->getRepository(Place::class)
            ->findOneBy(['name' => 'Torre dos Clérigos'])
        ;

        $this->assertSame("Torre dos Clérigos", $object->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}