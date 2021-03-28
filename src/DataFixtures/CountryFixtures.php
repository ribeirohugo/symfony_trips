<?php
namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{
    public const PORTUGAL_REFERENCE = "pt";

    public const SPAIN_REFERENCE = "es";

    public function load(ObjectManager $manager)
    {
        $country1 = new Country('Portugal','PT');
        $manager->persist($country1);
        $manager->flush();

        $this->addReference(self::PORTUGAL_REFERENCE, $country1);

        $country = new Country('Spain','ES');
        $manager->persist($country);
        $manager->flush();

        $this->addReference(self::SPAIN_REFERENCE, $country);

    }
}
