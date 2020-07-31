<?php
namespace App\DataFixtures;

use App\Entity\Location;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LocationFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $location = new Location();
        $location->setName('Porto');
        $manager->persist($region);

        $location = new Location();
        $location->setName('Lisboa');
        $manager->persist($region);


        $manager->flush();
    }
}
