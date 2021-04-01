<?php namespace App\Tests\Entity;

use App\Entity\Edition;
use App\Entity\Report;
use PHPUnit\Framework\TestCase;

class ReportTest extends TestCase {

    public const REPORT_URL = "http://site.domain";

    public function testReport() {
        $report = new Report();

        $report->setId(1);
        $this->assertEquals(1, $report->getId());

        $report->setUrl(self::REPORT_URL);
        $this->assertEquals(self::REPORT_URL, $report->getUrl());

        $edition = new Edition();
        $report->setEdition($edition);
        $this->assertEquals($edition, $report->getEdition());
    }


}
