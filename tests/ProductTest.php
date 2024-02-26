<?php

require_once 'src/Product.php';

use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    // Created this method so I don't have to repeat the instantiate code
    private function getProductInstance(): Product
    {
        return new Product('Test', 10);
    }

    public function test_product_getTitle(): void
    {
        $subject = $this->getProductInstance();
        $expected = 'Test';
        $actual = $subject->getTitle();
        $this->assertEquals($expected, $actual);
    }

    public function test_product_getPrice(): void
    {
        $subject = $this->getProductInstance();
        $expected = 10;
        $actual = $subject->getPrice();
        $this->assertEquals($expected, $actual);
    }
}
