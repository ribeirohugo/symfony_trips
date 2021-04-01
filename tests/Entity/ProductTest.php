<?php namespace App\Tests\Entity;

use App\Entity\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase {

    private const PRODUCT_NAME = "2020 - 1st semester";
    private const PRODUCT_PRICE = 20.3;

    public function testProductId() {
        $product = new Product();
        $product->setId(1);
        $this->assertEquals(1, $product->getId());
    }

    public function testProductName() {
        $product = new Product();
        $product->setName(self::PRODUCT_NAME);
        $this->assertEquals(self::PRODUCT_NAME, $product->getName());
    }

    public function testProductPrice() {
        $product = new Product();
        $product->setPrice(self::PRODUCT_PRICE);
        $this->assertEquals(self::PRODUCT_PRICE, $product->getPrice());
    }
}
