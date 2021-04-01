<?php namespace App\Tests\Entity;

use App\Entity\HostingType;
use PHPUnit\Framework\TestCase;

class HostingTypeTest extends TestCase {

    private const HOSTING_TYPE_NAME = "Hosting Type Name";
    private const HOSTING_TYPE_NAME2 = "Other Hosting Type Name";

    public function testHostingType() {
        $hostingType = new HostingType(self::HOSTING_TYPE_NAME);
        $this->assertEquals(self::HOSTING_TYPE_NAME, $hostingType->getName());

        $hostingType->setId(1);
        $this->assertEquals(1, $hostingType->getId());

        $hostingType->setName(self::HOSTING_TYPE_NAME2);
        $this->assertEquals(self::HOSTING_TYPE_NAME2, $hostingType->getName());
    }
}
