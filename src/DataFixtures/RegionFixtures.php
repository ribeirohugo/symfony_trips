<?php
namespace App\DataFixtures;

use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RegionFixtures extends Fixture implements DependentFixtureInterface
{
    public const LISBON_REFERENCE = "Lisbon";
    public const PORTO_REFERENCE = "Porto";
    public const LEIRIA_REFERENCE = "Leiria";
    public const FARO_REFERENCE = "Faro";
    public const BRAGA_REFERENCE = "Braga";
    public const AVEIRO_REFERENCE = "Aveiro";
    public const COIMBRA_REFERENCE = "Coimbra";
    public const SANTAREM_REFERENCE = "Santarém";

    public function load(ObjectManager $manager)
    {
        $region = new Region('Porto', $this->getReference(CountryFixtures::PORTUGAL_REFERENCE));
        $manager->persist($region);
        $manager->flush();

        $this->addReference(self::PORTO_REFERENCE, $region);

        $region = new Region('Lisbon', $this->getReference(CountryFixtures::PORTUGAL_REFERENCE));
        $manager->persist($region);
        $manager->flush();

        $this->addReference(self::LISBON_REFERENCE, $region);

        $region = new Region('Leiria', $this->getReference(CountryFixtures::PORTUGAL_REFERENCE));
        $manager->persist($region);
        $manager->flush();

        $this->addReference(self::LEIRIA_REFERENCE, $region);

        $region = new Region('Faro', $this->getReference(CountryFixtures::PORTUGAL_REFERENCE));
        $manager->persist($region);
        $manager->flush();

        $this->addReference(self::FARO_REFERENCE, $region);

        $region = new Region('Braga', $this->getReference(CountryFixtures::PORTUGAL_REFERENCE));
        $manager->persist($region);
        $manager->flush();

        $this->addReference(self::BRAGA_REFERENCE, $region);

        $region = new Region('Aveiro', $this->getReference(CountryFixtures::PORTUGAL_REFERENCE));
        $manager->persist($region);
        $manager->flush();

        $this->addReference(self::AVEIRO_REFERENCE, $region);

        $region = new Region('Coimbra', $this->getReference(CountryFixtures::PORTUGAL_REFERENCE));
        $manager->persist($region);
        $manager->flush();

        $this->addReference(self::COIMBRA_REFERENCE, $region);

        $region = new Region('Santarém', $this->getReference(CountryFixtures::PORTUGAL_REFERENCE));
        $manager->persist($region);
        $manager->flush();

        $this->addReference(self::SANTAREM_REFERENCE, $region);
    }

    public function getDependencies()
    {
        return [
            CountryFixtures::class,
        ];
    }
}
