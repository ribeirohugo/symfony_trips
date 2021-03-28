<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $activity = new Activity();
        $activity->setName('Trip to Algarve');
        $activity->setDescription('Travel to portuguese south for a beach and summer paradise. ');
        $activity->setActivityType($this->getReference(ActivityTypeFixtures::TRAVEL_REFERENCE));
        $manager->persist($activity);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ActivityTypeFixtures::class,
        ];
    }
}
