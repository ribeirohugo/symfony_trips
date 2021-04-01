<?php namespace App\Tests\Entity;

use App\Entity\ActivityType;
use PHPUnit\Framework\TestCase;

class ActivityTypeTest extends TestCase {

    private const ACTIVITY_TYPE_NAME = "Monument";
    private const ACTIVITY_TYPE_NAME2 = "Beach";

    public function testActivityType() {
        $activityType = new ActivityType(self::ACTIVITY_TYPE_NAME);
        $this->assertEquals(self::ACTIVITY_TYPE_NAME, $activityType->getName());

        $activityType->setName(self::ACTIVITY_TYPE_NAME2);
        $this->assertEquals(self::ACTIVITY_TYPE_NAME2,$activityType->getName());

        $activityType->setId(1);
        $this->assertEquals(1, $activityType->getId());
    }

    public function testActivityConstructor() {
        $activity = new ActivityType(self::ACTIVITY_TYPE_NAME);
        $activity2 = new ActivityType(self::ACTIVITY_TYPE_NAME);
        $this->assertEquals($activity,$activity2);
    }
}
