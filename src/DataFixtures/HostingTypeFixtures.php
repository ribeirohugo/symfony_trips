<?php

namespace App\DataFixtures;

use App\Entity\HostingType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HostingTypeFixtures extends Fixture
{
    public const HOSTEL_REFERENCE = "Hostel";
    public const HOTEL_REFERENCE = "Hotel";
    public const HOUSE_REFERENCE = "House";

    public function load(ObjectManager $manager)
    {
        $hostingType = new HostingType("Hostel");
        $manager->persist($hostingType);
        $manager->flush();

        $this->addReference(self::HOSTEL_REFERENCE, $hostingType);

        $hostingType = new HostingType("Hotel");
        $manager->persist($hostingType);
        $manager->flush();

        $this->addReference(self::HOTEL_REFERENCE, $hostingType);

        $hostingType = new HostingType("House");
        $manager->persist($hostingType);
        $manager->flush();

        $this->addReference(self::HOUSE_REFERENCE, $hostingType);
    }
}
