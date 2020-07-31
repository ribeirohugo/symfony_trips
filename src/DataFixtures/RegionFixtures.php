<?php
namespace App\DataFixtures;

use App\Entity\Region;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RegionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $region = new Region();
        $region->setName('Porto');
        $manager->persist($region);

        $region = new Region();
        $region->setName('Lisboa');
        $manager->persist($region);

        $manager->flush();
    }
}
