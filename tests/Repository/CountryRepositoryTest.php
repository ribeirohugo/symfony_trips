<?php namespace App\Tests\Repository;

use App\Entity\Country;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CountryRepositoryTest extends KernelTestCase
{
    private const COUNTRY_NAME = "Portugal";

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
            ->getRepository(Country::class)
            ->findOneBy(['name' => self::COUNTRY_NAME])
        ;

        $this->assertSame(self::COUNTRY_NAME, $object->getName());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        // doing this is recommended to avoid memory leaks
        $this->entityManager->close();
        $this->entityManager = null;
    }
}
