<?php namespace App\Tests\Entity;

use App\Entity\Activity;
use App\Entity\Product;
use App\Entity\ProductActivity;
use PHPUnit\Framework\TestCase;

class ProductActivityTest extends TestCase {

    public function testProductActivity() {
        $productActivity = new ProductActivity();

        $productActivity->setId(1);
        $this->assertEquals(1, $productActivity->getId());

        $activity = new Activity();
        $productActivity->setActivity($activity);
        $this->assertEquals($activity, $productActivity->getActivity());

        $product = new Product();
        $productActivity->setProduct($product);
        $this->assertEquals($product, $productActivity->getProduct());
    }

}
