<?php namespace App\Tests\Entity;

use App\Entity\Activity;
use App\Entity\CityTour;
use PHPUnit\Framework\TestCase;

class CityTourTest extends TestCase {

    private const CITY_TOUR_TITLE = "City Tour Title Test";

    public function testCityTourTitle() {
        $cityTour = new CityTour();

        $cityTour->setId(1);
        $this->assertEquals(1, $cityTour->getId());

        $cityTour->setTitle(self::CITY_TOUR_TITLE);
        $this->assertEquals(self::CITY_TOUR_TITLE,$cityTour->getTitle());
    }

    public function testCityTourActivity() {
        $cityTour = new CityTour();

        $activity = new Activity();

        $cityTour->setActivity($activity);
        $this->assertEquals($activity, $cityTour->getActivity());
    }


}
