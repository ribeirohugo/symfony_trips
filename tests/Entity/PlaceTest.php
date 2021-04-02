<?php namespace App\Tests\Entity;

use App\Entity\Contact;
use App\Entity\Country;
use App\Entity\HostingType;
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

    private const PLACE_DRIVE_FILES = "http://teste.domain";

    private const PLACE_STARS = 4.5;

    private const PLACE_HOSTING_TYPE_NAME = "Hosting Type Name";

    private const PLACE_MAIN_CONTACT = "Main Contact";

    public function testPlaceName() {
        $place = new Place();

        $place->setId(1);
        $this->assertEquals(1, $place->getId());

        $place->setName(self::PLACE_NAME);
        $this->assertEquals(self::PLACE_NAME, $place->getName());

        $place->setDescription(self::PLACE_DESCRIPTION);
        $this->assertEquals(self::PLACE_DESCRIPTION, $place->getDescription());

        $country = new Country(self::COUNTRY_NAME, self::COUNTRY_SLUG);
        $region = new Region(self::REGION_NAME, $country);
        $location = new Location(self::LOCATION_NAME, $region);

        $place->setLocation($location);
        $this->assertEquals($location, $place->getLocation());

        $timestamp = new \DateTime();

        $place->setTimestamp($timestamp);
        $this->assertEquals($timestamp, $place->getTimestamp());

        $placeType = new PlaceType(self::PLACE_TYPE_NAME);
        $place->setPlaceType($placeType);
        $this->assertEquals($placeType, $place->getPlaceType());

        $place->setAddress(self::PLACE_ADDRESS);
        $this->assertEquals(self::PLACE_ADDRESS, $place->getAddress());

        $place->setNegativePoints(self::PLACE_NEGATIVE_POINTS);
        $this->assertEquals(self::PLACE_NEGATIVE_POINTS, $place->getNegativePoints());

        $place->setPositivePoints(self::PLACE_POSITIVE_POINTS);
        $this->assertEquals(self::PLACE_POSITIVE_POINTS, $place->getPositivePoints());

        $place->setLastPrice(self::PLACE_LAST_PRICE);
        $this->assertEquals(self::PLACE_LAST_PRICE, $place->getLastPrice());

        $place->setDriveFiles(self::PLACE_DRIVE_FILES);
        $this->assertEquals(self::PLACE_DRIVE_FILES, $place->getDriveFiles());

        $place->setStars(self::PLACE_STARS);
        $this->assertEquals(self::PLACE_STARS, $place->getStars());

        $hostingType = new HostingType(self::PLACE_HOSTING_TYPE_NAME);
        $place->setHostingType($hostingType);
        $this->assertEquals($hostingType, $place->getHostingType());

        $place->setMainContact(self::PLACE_MAIN_CONTACT);
        $this->assertEquals(self::PLACE_MAIN_CONTACT, $place->getMainContact());
    }
}
