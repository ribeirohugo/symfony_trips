<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $activity = new Activity();
        $activity->setName('Trip to Algarve');
        $activity->setDescription('Travel to portuguese south for a beach and summer paradise. ');
        $manager->persist($activity);

        // add more products

        $manager->flush();
    }
}
