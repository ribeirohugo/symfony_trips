<?php namespace App\Tests\Repository;

use App\Entity\PlaceType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PlaceTypeRepositoryTest extends KernelTestCase
{
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

    public function testSearchById()
    {
        $object = $this->entityManager
            ->getRepository(PlaceType::class)
            ->find(1)
        ;

        $this->assertSame(1, $object->getId());
    }

    public function testSearchByName()
    {
        $object = $this->entityManager
            ->getRepository(PlaceType::class)
            ->findOneBy(['name' => 'club'])
        ;

        $this->assertSame("Club", $object->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
