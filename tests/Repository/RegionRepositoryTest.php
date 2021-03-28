<?php namespace App\Tests\Repository;

use App\Entity\Region;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RegionRepositoryTest extends KernelTestCase
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
        $region = $this->entityManager
            ->getRepository(Region::class)
            ->find(1)
        ;

        $this->assertSame(1, $region->getId());
    }

    public function testSearchByName()
    {
        $region = $this->entityManager
            ->getRepository(Region::class)
            ->findOneBy(['name' => 'Porto'])
        ;

        $this->assertSame("Porto", $region->getName());
    }

    public function testSearchByCountry()
    {
        $region = $this->entityManager
            ->getRepository(Region::class)
            ->findOneBy(['name' => 'Porto'])
        ;

		$country = $region->getCountry();

        $this->assertSame("Portugal", $country->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
