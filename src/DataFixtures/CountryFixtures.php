<?php
namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $country = new Country();
        $country->setName('Portugal');
        $country->setSlug('PT');
        $manager->persist($country);

        $country = new Country();
        $country->setName('Spain');
        $country->setSlug('ES');
        $manager->persist($country);

        $manager->flush();
    }
}
