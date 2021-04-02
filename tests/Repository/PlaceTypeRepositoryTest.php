<?php namespace App\Tests\Repository;

use App\Entity\PlaceType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PlaceTypeRepositoryTest extends KernelTestCase
{
    private const PLACE_TYPE_NAME = "Club";

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
            ->getRepository(PlaceType::class)
            ->findOneBy(['name' => self::PLACE_TYPE_NAME])
        ;

        $this->assertSame(self::PLACE_TYPE_NAME, $object->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
