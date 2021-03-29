<?php namespace App\Tests\Entity;

use App\Entity\Country;
use App\Entity\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase {

    private const REGION_NAME = "Porto";
    private const COUNTRY_NAME = "Portugal";
    private const COUNTRY_SLUG = "pt";

    public function testRegion() {
        $country = new Country(self::COUNTRY_NAME, self::COUNTRY_SLUG);
        $region = new Region(self::REGION_NAME, $country);
        $this->assertEquals(self::REGION_NAME, $region->getName());
        $this->assertEquals($country, $region->getCountry());
    }
}
