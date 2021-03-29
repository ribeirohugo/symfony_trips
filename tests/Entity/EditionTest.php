<?php namespace App\Tests\Entity;

use App\Entity\Activity;
use App\Entity\Edition;
use PHPUnit\Framework\TestCase;

class EditionTest extends TestCase {

    private const EDITION_SEMESTER = "2020 - 1st semester";

    public function testEditionSemester() {
        $edition = new Edition();
        $edition->setSemester(self::EDITION_SEMESTER);
        $this->assertEquals(self::EDITION_SEMESTER, $edition->getSemester());

        $edition->setSemester(self::EDITION_SEMESTER);
        $this->assertEquals(self::EDITION_SEMESTER, $edition->getSemester());
    }

    public function testEditionActivity() {
        $edition = new Edition();

        $activity = new Activity();

        $edition->setActivity(null);
        $this->assertNull($edition->getActivity());

        $edition->setActivity($activity);
        $this->assertEquals($activity, $edition->getActivity());
    }
}
