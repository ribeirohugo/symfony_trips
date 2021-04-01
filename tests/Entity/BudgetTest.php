<?php namespace App\Tests\Entity;

use App\Entity\Budget;
use PHPUnit\Framework\TestCase;

class BudgetTest extends TestCase {

    private const BUDGET_URL = "Budget Url test";

    public function testBudget() {
        $budget = new Budget();

        $budget->setId(1);
        $this->assertEquals(1, $budget->getId());

        $budget->setUrl(self::BUDGET_URL);
        $this->assertEquals(self::BUDGET_URL, $budget->getUrl());

        $budget->setEdition(null);
        $this->assertNull($budget->getEdition());
    }
}
