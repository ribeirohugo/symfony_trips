<?php namespace App\Tests\Entity;

use App\Entity\Country;
use App\Entity\Region;
use PHPUnit\Framework\TestCase;

class RegionTest extends TestCase {

    private const REGION_NAME = "Porto";
    private const COUNTRY_NAME = "Portugal";
    private const COUNTRY_SLUG = "pt";

    private const COUNTRY_NAME2 = "Spain";
    private const COUNTRY_SLUG2 = "es";
    private const REGION_NAME2 = "Vigo";

    public function testRegion() {
        $country = new Country(self::COUNTRY_NAME, self::COUNTRY_SLUG);
        $region = new Region(self::REGION_NAME, $country);
        $this->assertEquals(self::REGION_NAME, $region->getName());
        $this->assertEquals($country, $region->getCountry());

        $region->setId(1);
        $this->assertEquals(1, $region->getId());

        $region->setName(self::REGION_NAME2);
        $this->assertEquals(self::REGION_NAME2, $region->getName());

        $country2 = new Country(self::COUNTRY_NAME2, self::COUNTRY_SLUG2);
        $region->setCountry($country2);
        $this->assertEquals($country2, $region->getCountry());
    }
}
