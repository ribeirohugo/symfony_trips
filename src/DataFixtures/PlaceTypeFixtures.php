<?php

namespace App\DataFixtures;

use App\Entity\PlaceType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PlaceTypeFixtures extends Fixture
{
    public const BAR_REFERENCE = "Bar";
    public const BEACH_REFERENCE = "Beach";
    public const CLUB_REFERENCE = "Club";
    public const HOSTING_REFERENCE = "Hosting";
    public const MONUMENT_REFERENCE = "Monument";
    public const MUSEUM_REFERENCE = "Museum";
    public const RESTAURANT_REFERENCE = "Restaurant";

    public function load(ObjectManager $manager)
    {
        $placeType = new PlaceType('Bar');
        $manager->persist($placeType);
        $manager->flush();

        $this->addReference(self::BAR_REFERENCE, $placeType);

        $placeType = new PlaceType('Beach');
        $manager->persist($placeType);
        $manager->flush();

        $this->addReference(self::BEACH_REFERENCE, $placeType);

        $placeType = new PlaceType('Club');
        $manager->persist($placeType);
        $manager->flush();

        $this->addReference(self::CLUB_REFERENCE, $placeType);

        $placeType = new PlaceType('Hosting');
        $manager->persist($placeType);
        $manager->flush();

        $this->addReference(self::HOSTING_REFERENCE, $placeType);

        $placeType = new PlaceType('Monument');
        $manager->persist($placeType);
        $manager->flush();

        $this->addReference(self::MONUMENT_REFERENCE, $placeType);

        $placeType = new PlaceType('Museum');
        $manager->persist($placeType);
        $manager->flush();

        $this->addReference(self::MUSEUM_REFERENCE, $placeType);

        $placeType = new PlaceType('Restaurant');
        $manager->persist($placeType);
        $manager->flush();

        $this->addReference(self::RESTAURANT_REFERENCE, $placeType);
    }
}
