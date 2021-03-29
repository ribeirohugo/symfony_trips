<?php namespace App\Tests\Entity;

use App\Entity\Country;
use App\Entity\Location;
use App\Entity\Region;
use PHPUnit\Framework\TestCase;

class LocationTest extends TestCase {


    private const COUNTRY_NAME = "Portugal";
    private const COUNTRY_SLUG = "pt";
    private const REGION_NAME = "Porto";
    private const LOCATION_NAME = "Matosinhos";

    public function testLocation() {
        $country = new Country(self::COUNTRY_NAME, self::COUNTRY_SLUG);
        $region = new Region(self::REGION_NAME, $country);
        $location = new Location(self::LOCATION_NAME, $region);

        $this->assertEquals(self::LOCATION_NAME, $location->getName());
        $this->assertEquals($region, $location->getRegion());
    }
}
