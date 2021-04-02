<?php namespace App\Tests\Repository;

use App\Entity\Place;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PlaceRepositoryTest extends KernelTestCase
{
    private const PLACE_NAME = "Torre dos Clérigos";

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
            ->getRepository(Place::class)
            ->findOneBy(['name' => self::PLACE_NAME])
        ;

        $this->assertSame(self::PLACE_NAME, $object->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
