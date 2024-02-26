<?php

require_once 'src/Basket.php';

use PHPUnit\Framework\TestCase;

class BasketTest extends TestCase
{
    public function test_add_whenEmptyReturnsTrue(): void
    {
        $basket = new Basket();

        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getTitle')->willReturn('test');

        $result = $basket->add($mockProduct);
        $this->assertTrue($result);
    }

    public function test_add_duplicateProductReturnsFalse(): void
    {
        $basket = new Basket();

        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getTitle')->willReturn('test');

        $basket->add($mockProduct);

        $result = $basket->add($mockProduct);
        $this->assertFalse($result);
    }

    public function test_remove_emptyReturnsFalse(): void
    {
        $basket = new Basket();

        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getTitle')->willReturn('test');


        $result = $basket->remove($mockProduct);
        $this->assertFalse($result);
    }

    public function test_remove_productExistsReturnsTrue(): void
    {
        $basket = new Basket();

        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getTitle')->willReturn('test');

        $basket->add($mockProduct);
        $result = $basket->remove($mockProduct);
        $this->assertTrue($result);
    }

    public function test_getContents_emptyBasket(): void
    {
        $basket = new Basket();

        $expected = [];

        $actual = $basket->getContents();

        $this->assertEquals($expected, $actual);
    }

    public function test_getContents_afterAddingProduct(): void
    {
        $basket = new Basket();

        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getTitle')->willReturn('test');

        $basket->add($mockProduct);

        $actual = $basket->getContents();

        $this->assertArrayHasKey('test', $actual);
    }

    public function test_count_emptyBasket(): void
    {
        $basket = new Basket();

        $expected = 0;

        $actual = $basket->count();

        $this->assertEquals($expected, $actual);
    }

    public function test_count_afterAdding(): void
    {
        $basket = new Basket();

        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getTitle')->willReturn('test');

        $basket->add($mockProduct);

        $expected = 1;
        $actual = $basket->count();

        $this->assertEquals($expected, $actual);
    }

    public function test_count_afterRemoving(): void
    {
        $basket = new Basket();

        $mockProduct = $this->createMock(Product::class);
        $mockProduct->method('getTitle')->willReturn('test');

        $basket->add($mockProduct);
        $basket->remove($mockProduct);

        $expected = 0;
        $actual = $basket->count();

        $this->assertEquals($expected, $actual);
    }
}
