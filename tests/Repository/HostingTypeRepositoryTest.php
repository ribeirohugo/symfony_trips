<?php namespace App\Tests\Repository;

use App\Entity\HostingType;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class HostingTypeRepositoryTest extends KernelTestCase
{
    private const HOSTING_TYPE_NAME = "Hostel";

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
            ->getRepository(HostingType::class)
            ->findOneBy(['name' => self::HOSTING_TYPE_NAME])
        ;

        $this->assertSame(self::HOSTING_TYPE_NAME, $object->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
