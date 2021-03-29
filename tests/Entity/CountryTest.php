<?php namespace App\Tests\Entity;

use App\Entity\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase {

    private const COUNTRY_NAME = "Portugal";
    private const COUNTRY_SLUG = "pt";

    public function testCountryName() {
        $country = new Country(self::COUNTRY_NAME, self::COUNTRY_SLUG);
        $this->assertEquals(self::COUNTRY_NAME, $country->getName());
        $this->assertEquals(self::COUNTRY_SLUG, $country->getSlug());
    }
}
