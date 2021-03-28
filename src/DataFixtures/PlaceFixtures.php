<?php namespace App\DataFixtures;

use App\Entity\Place;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PlaceFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $place = new Place();
        $place->setName('Torre dos Clérigos');
        $place->setPlaceType($this->getReference(PlaceTypeFixtures::MONUMENT_REFERENCE));
        $place->setLocation($this->getReference(LocationFixtures::PORTO_REFERENCE));
        $manager->persist($place);

        $manager->flush();

        $place = new Place();
        $place->setName('Sé Catedral');
        $place->setPlaceType($this->getReference(PlaceTypeFixtures::MONUMENT_REFERENCE));
        $place->setLocation($this->getReference(LocationFixtures::PORTO_REFERENCE));
        $manager->persist($place);

        $manager->flush();

        $place = new Place();
        $place->setName('Palácio da Bolsa');
        $place->setPlaceType($this->getReference(PlaceTypeFixtures::MONUMENT_REFERENCE));
        $place->setLocation($this->getReference(LocationFixtures::PORTO_REFERENCE));
        $manager->persist($place);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            LocationFixtures::class,
            PlaceTypeFixtures::class,
        ];
    }
}
