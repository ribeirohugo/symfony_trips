<?php namespace App\Tests\Entity;

use App\Entity\Country;
use PHPUnit\Framework\TestCase;

class CountryTest extends TestCase {

    private const COUNTRY_NAME = "Portugal";
    private const COUNTRY_NAME2 = "Spain";
    private const COUNTRY_SLUG = "pt";
    private const COUNTRY_SLUG2 = "es";


    public function testCountry() {
        $country = new Country(self::COUNTRY_NAME, self::COUNTRY_SLUG);
        $this->assertEquals(self::COUNTRY_NAME, $country->getName());
        $this->assertEquals(self::COUNTRY_SLUG, $country->getSlug());

        $country->setId(1);
        $this->assertEquals(1, $country->getId());

        $country->setName(self::COUNTRY_NAME2);
        $this->assertEquals(self::COUNTRY_NAME2, $country->getName());

        $country->setSlug(self::COUNTRY_SLUG2);
        $this->assertEquals(self::COUNTRY_SLUG2, $country->getSlug());


    }
}
