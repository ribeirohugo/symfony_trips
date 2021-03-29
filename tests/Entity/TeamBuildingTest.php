<?php namespace App\Tests\Entity;

use App\Entity\TeamBuilding;
use PHPUnit\Framework\TestCase;

class TeamBuildingTest extends TestCase {

    private const TEAM_BUILDING_URL = "Team Building URL";

    public function testTeamBuildingUrl() {
        $teamBuilding = new TeamBuilding();
        $teamBuilding->setUrl(self::TEAM_BUILDING_URL);
        $this->assertEquals(self::TEAM_BUILDING_URL, $teamBuilding->getUrl());
    }
}
