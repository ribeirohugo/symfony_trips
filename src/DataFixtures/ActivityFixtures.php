<?php namespace App\DataFixtures;

use App\Entity\Activity;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ActivityFixtures extends Fixture implements DependentFixtureInterface
{
    public const ACTIVITY_REFERENCE = "Trip to Algarve";
    public const ACTIVITY1_NAME = "Trip to Algarve";
    public const ACTIVITY2_NAME = "Passadiços do Paiva";

    public function load(ObjectManager $manager)
    {
        $activity = new Activity();
        $activity->setName(self::ACTIVITY1_NAME);
        $activity->setDescription('Travel to portuguese south for a beach and summer paradise. ');
        $activity->setActivityType($this->getReference(ActivityTypeFixtures::TRAVEL_REFERENCE));
        $manager->persist($activity);

        $manager->flush();

        $this->addReference(self::ACTIVITY_REFERENCE, $activity);

        $activity = new Activity();
        $activity->setName(self::ACTIVITY2_NAME);
        $activity->setDescription('Trekking to one of most portuguese walkways inside nature.');
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
