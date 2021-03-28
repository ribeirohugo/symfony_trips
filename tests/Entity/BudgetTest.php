<?php namespace App\Tests\Entity;

use App\Entity\Budget;
use PHPUnit\Framework\TestCase;

class BudgetTest extends TestCase {

    private const BUDGET_URL = "Budget Url test";

    public function testBudgetUrl() {
        $budget = new Budget();
        $budget->setUrl(self::BUDGET_URL);
        $this->assertEquals(self::BUDGET_URL, $budget->getUrl());
    }

    public function testBudgetEdition() {
        $budget = new Budget();
        $budget->setEdition(null);
        $this->assertNull($budget->getEdition());
    }

}
