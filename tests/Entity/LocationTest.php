<?php namespace App\Tests\Entity;

use App\Entity\Country;
use App\Entity\Location;
use App\Entity\Region;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase {

    private const COUNTRY_NAME = "Portugal";
    private const COUNTRY_SLUG = "pt";
    private const REGION_NAME = "Porto";
    private const REGION_NAME2 = "Aveiro";
    private const LOCATION_NAME = "Matosinhos";
    private const LOCATION_NAME2 = "Aveiro";

    public function testLocation() {
        $country = new Country(self::COUNTRY_NAME, self::COUNTRY_SLUG);
        $region = new Region(self::REGION_NAME, $country);
        $location = new Location(self::LOCATION_NAME, $region);

        $location->setId(1);
        $this->assertEquals(1, $location->getId());

        $this->assertEquals(self::LOCATION_NAME, $location->getName());

        $location->setName(self::LOCATION_NAME2);
        $this->assertEquals(self::LOCATION_NAME2, $location->getName());

        $this->assertEquals($region, $location->getRegion());

        $region2 = new Region(self::REGION_NAME2, $country);
        $location->setRegion($region2);
        $this->assertEquals($region2, $location->getRegion());
    }
}
