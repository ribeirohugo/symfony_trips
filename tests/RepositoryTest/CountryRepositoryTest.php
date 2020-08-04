<?php // tests/Repository/RegionRepositoryTest.php
namespace App\Tests\Repository;

use App\Entity\Country;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CountryRepositoryTest extends KernelTestCase
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
            ->getRepository(Country::class)
            ->find(1)
        ;

        $this->assertSame(1, $object->getId());
    }

    public function testSearchByName()
    {
        $object = $this->entityManager
            ->getRepository(Country::class)
            ->findOneBy(['name' => 'Portugal'])
        ;

        $this->assertSame("Portugal", $object->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}