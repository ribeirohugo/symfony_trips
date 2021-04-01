<?php namespace App\Tests\Entity;

use App\Entity\Place;
use App\Entity\PlaceType;
use PHPUnit\Framework\TestCase;

class PlaceTypeTest extends TestCase {

    private const PLACE_TYPE_NAME = "Place Type Name";
    private const PLACE_TYPE_NAME2 = "Other Place Type Name";

    public function testPlaceType() {
        $placeType = new PlaceType(self::PLACE_TYPE_NAME);

        $placeType->setId(1);
        $this->assertEquals(1, $placeType->getId());

        $this->assertEquals(self::PLACE_TYPE_NAME, $placeType->getName());

        $placeType->setName(self::PLACE_TYPE_NAME2);
        $this->assertEquals(self::PLACE_TYPE_NAME2, $placeType->getName());

        $this->assertEquals(false, $placeType->hasPlaces());

        $place = new Place();

        $placeType->addPlace($place);
        $places = $placeType->getPlaces();
        $this->assertEquals($places, $placeType->getPlaces());
    }
}
