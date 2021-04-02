<?php namespace App\Tests\Repository;

use App\Entity\Region;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class RegionRepositoryTest extends KernelTestCase
{
    private const COUNTRY_NAME = "Portugal";
    private const REGION_NAME = "Porto";

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
        $region = $this->entityManager
            ->getRepository(Region::class)
            ->findOneBy(['name' => self::REGION_NAME])
        ;

        $this->assertSame(self::REGION_NAME, $region->getName());
    }

    public function testSearchByCountry()
    {
        $region = $this->entityManager
            ->getRepository(Region::class)
            ->findOneBy(['name' => self::REGION_NAME])
        ;

		$country = $region->getCountry();

        $this->assertSame(self::COUNTRY_NAME, $country->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
