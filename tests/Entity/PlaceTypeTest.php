<?php namespace App\Tests\Entity;

use App\Entity\PlaceType;
use PHPUnit\Framework\TestCase;

class PlaceTypeTest extends TestCase {

    private const PLACE_TYPE_NAME = "Place Type Name";
    private const PLACE_TYPE_NAME2 = "Other Place Type Name";

    public function testPlaceType() {
        $placeType = new PlaceType(self::PLACE_TYPE_NAME);
        $this->assertEquals(self::PLACE_TYPE_NAME, $placeType->getName());

        $placeType->setName(self::PLACE_TYPE_NAME2);
        $this->assertEquals(self::PLACE_TYPE_NAME2, $placeType->getName());
    }
}
