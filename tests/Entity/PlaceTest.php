<?php namespace App\Tests\Entity;

use App\Entity\Country;
use App\Entity\Location;
use App\Entity\Place;
use App\Entity\PlaceType;
use App\Entity\Region;
use PHPUnit\Framework\TestCase;

class PlaceTest extends TestCase {

    private const PLACE_NAME = "Place Name";
    private const PLACE_DESCRIPTION = "Place Description";

    private const COUNTRY_NAME = "Portugal";
    private const COUNTRY_SLUG = "pt";
    private const REGION_NAME = "Porto";
    private const LOCATION_NAME = "Matosinhos";

    private const PLACE_TYPE_NAME = "Place Type";

    private const PLACE_ADDRESS = "Place Address";

    private const PLACE_NEGATIVE_POINTS = "Negative Points";
    private const PLACE_POSITIVE_POINTS = "Positive Points";

    private const PLACE_LAST_PRICE = 20.3;


    public function testPlaceName() {
        $place = new Place();

        $place->setName(self::PLACE_NAME);
        $this->assertEquals(self::PLACE_NAME, $place->getName());

    }

    public function testPlaceDescription() {
        $place = new Place();

        $place->setDescription(self::PLACE_DESCRIPTION);
        $this->assertEquals(self::PLACE_DESCRIPTION, $place->getDescription());
    }

    public function testPlaceLocation() {
        $place = new Place();

        $country = new Country(self::COUNTRY_NAME, self::COUNTRY_SLUG);
        $region = new Region(self::REGION_NAME, $country);
        $location = new Location(self::LOCATION_NAME, $region);

        $place->setLocation($location);
        $this->assertEquals($location, $place->getLocation());
    }

    public function testPlaceTimestamp() {
        $place = new Place();

        $timestamp = new \DateTime();

        $place->setTimestamp($timestamp);
        $this->assertEquals($timestamp, $place->getTimestamp());
    }

    public function testPlaceType() {
        $placeType = new PlaceType(self::PLACE_TYPE_NAME);
        $place = new Place();

        $place->setPlaceType($placeType);
        $this->assertEquals($placeType, $place->getPlaceType());
    }

    public function testPlaceAddress() {
        $place = new Place();

        $place->setAddress(self::PLACE_ADDRESS);
        $this->assertEquals(self::PLACE_ADDRESS, $place->getAddress());
    }

    public function testPlaceNegativePoints() {
        $place = new Place();

        $place->setNegativePoints(self::PLACE_NEGATIVE_POINTS);
        $this->assertEquals(self::PLACE_NEGATIVE_POINTS, $place->getNegativePoints());
    }

    public function testPlacePositivePoints() {
        $place = new Place();

        $place->setPositivePoints(self::PLACE_POSITIVE_POINTS);
        $this->assertEquals(self::PLACE_POSITIVE_POINTS, $place->getPositivePoints());
    }

    public function testLastPrice() {
        $place = new Place();

        $place->setLastPrice(self::PLACE_LAST_PRICE);
        $this->assertEquals(self::PLACE_LAST_PRICE, $place->getLastPrice());
    }
}
