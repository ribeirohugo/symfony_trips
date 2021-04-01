<?php namespace App\Tests\Entity;

use App\Entity\Activity;
use App\Entity\ActivityType;
use PHPUnit\Framework\TestCase;

class ActivityTest extends TestCase {

    private const ACTIVITY_NAME = "Name Test";
    private const ACTIVITY_DESCRIPTION = "Description Test";
    private const ACTIVITY_DRIVE_FILES = "Drive Files Test";
    private const ACTIVITY_TYPE_NAME = "Activity Type Test";

    public function testActivityName() {
        $activity = new Activity();
        $activity->setName(self::ACTIVITY_NAME);
        $this->assertEquals(self::ACTIVITY_NAME,$activity->getName());
    }

    public function testActivityDescription() {
        $activity = new Activity();
        $activity->setDescription(self::ACTIVITY_DESCRIPTION);
        $this->assertEquals(self::ACTIVITY_DESCRIPTION,$activity->getDescription());
    }

    public function testActivityDriveFiles() {
        $activity = new Activity();
        $activity->setDriveFiles(self::ACTIVITY_DRIVE_FILES);
        $this->assertEquals(self::ACTIVITY_DRIVE_FILES,$activity->getDriveFiles());
    }

    public function testActivityTimestamp() {
        $activity = new Activity();
        $timestamp = new \DateTime();
        $activity->setTimestamp($timestamp);
        $this->assertEquals($timestamp,$activity->getTimestamp());
    }

    public function testActivityType() {
        $activity = new Activity();
        $activityType = new ActivityType(self::ACTIVITY_TYPE_NAME);
        $activity->setActivityType($activityType);
        $this->assertEquals($activityType,$activity->getActivityType());
    }

    public function testActivityConstructor() {
        $activity = new Activity();
        $activity2 = new Activity();

        $activity->setName(self::ACTIVITY_NAME);
        $activity2->setName(self::ACTIVITY_NAME);

        $activity->setDescription(self::ACTIVITY_DESCRIPTION);
        $activity2->setDescription(self::ACTIVITY_DESCRIPTION);

        $activity->setDriveFiles(self::ACTIVITY_DRIVE_FILES);
        $activity2->setDriveFiles(self::ACTIVITY_DRIVE_FILES);

        $timestamp = new \DateTime();
        $activity->setTimestamp($timestamp);
        $activity2->setTimestamp($timestamp);

        $activityType = new ActivityType(self::ACTIVITY_TYPE_NAME);
        $activity->setActivityType($activityType);
        $activity2->setActivityType($activityType);

        $activity->setId(1);
        $activity2->setId(1);
        $this->assertEquals(1, $activity->getId());

        $this->assertEquals($activity, $activity2);
    }
}
