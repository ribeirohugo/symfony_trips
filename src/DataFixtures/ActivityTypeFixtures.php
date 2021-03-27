<?php

namespace App\DataFixtures;

use App\Entity\ActivityType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActivityTypeFixtures extends Fixture
{
    public const EVENT_REFERENCE = "Event";
    public const PARTY_REFERENCE = "Party";
    public const TRAVEL_REFERENCE = "Travel";

    public function load(ObjectManager $manager)
    {
        $activityType = new ActivityType("Event");
        $manager->persist($activityType);
        $manager->flush();

        $this->addReference(self::EVENT_REFERENCE, $activityType);

        $activityType = new ActivityType("Party");
        $manager->persist($activityType);
        $manager->flush();

        $this->addReference(self::PARTY_REFERENCE, $activityType);

        $activityType = new ActivityType("Travel");
        $manager->persist($activityType);
        $manager->flush();

        $this->addReference(self::TRAVEL_REFERENCE, $activityType);
    }
}
