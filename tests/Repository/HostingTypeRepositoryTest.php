<?php namespace App\Tests\Repository;

use App\Entity\HostingType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class HostingTypeRepositoryTest extends KernelTestCase
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
            ->getRepository(HostingType::class)
            ->find(1)
        ;

        $this->assertSame(1, $object->getId());
    }

    public function testSearchByName()
    {
        $object = $this->entityManager
            ->getRepository(HostingType::class)
            ->findOneBy(['name' => 'Hostel'])
        ;

        $this->assertSame("Hostel", $object->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
