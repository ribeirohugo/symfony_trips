<?php
namespace App\DataFixtures;

use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture implements DependentFixtureInterface
{
    public const PORTO_REFERENCE = "Porto_Location";

    public function load(ObjectManager $manager)
    {
        $location = new Location('Porto', $this->getReference(RegionFixtures::PORTO_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $this->addReference(self::PORTO_REFERENCE, $location);

        $location = new Location('Valongo', $this->getReference(RegionFixtures::PORTO_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Lisbon', $this->getReference(RegionFixtures::LISBON_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Sintra', $this->getReference(RegionFixtures::LISBON_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Cascais', $this->getReference(RegionFixtures::LISBON_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Óbidos', $this->getReference(RegionFixtures::LEIRIA_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Fátima', $this->getReference(RegionFixtures::LEIRIA_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Peniche', $this->getReference(RegionFixtures::LEIRIA_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Faro', $this->getReference(RegionFixtures::FARO_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Portimão', $this->getReference(RegionFixtures::FARO_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Albufeira', $this->getReference(RegionFixtures::FARO_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Braga', $this->getReference(RegionFixtures::BRAGA_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Guimarães', $this->getReference(RegionFixtures::BRAGA_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Aveiro', $this->getReference(RegionFixtures::AVEIRO_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Arouca', $this->getReference(RegionFixtures::AVEIRO_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Coimbra', $this->getReference(RegionFixtures::COIMBRA_REFERENCE));
        $manager->persist($location);
        $manager->flush();

        $location = new Location('Tomar', $this->getReference(RegionFixtures::SANTAREM_REFERENCE));
        $manager->persist($location);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            RegionFixtures::class,
        ];
    }
}
