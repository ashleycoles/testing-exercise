<?php

require_once 'src/SimpleBasket.php';

use PHPUnit\Framework\TestCase;

class SimpleBasketTest extends TestCase
{

    public function test_add_whenEmptyReturnsTrue(): void
    {
        $subject = new SimpleBasket();
        $result = $subject->add('Test');
        $this->assertTrue($result);
    }

    public function test_add_duplicateProductReturnsFalse(): void
    {
        $subject = new SimpleBasket();
        $subject->add('Test');
        $result = $subject->add('Test');
        $this->assertFalse($result);
    }

    public function test_remove_emptyReturnsFalse(): void
    {
        $subject = new SimpleBasket();
        $result = $subject->remove('Test');
        $this->assertFalse($result);
    }

    public function test_remove_productExistsReturnsTrue(): void
    {
        $subject = new SimpleBasket();
        $subject->add('Test');
        $result = $subject->remove('Test');
        $this->assertTrue($result);
    }

    public function test_count_empty(): void
    {
        $subject = new SimpleBasket();
        $expected = 0;
        $actual = $subject->count();
        $this->assertEquals($expected, $actual);
    }

    public function test_count_afterAdding(): void
    {
        $subject = new SimpleBasket();
        $subject->add('Test');

        $expected = 1;
        $actual = $subject->count();
        $this->assertEquals($expected, $actual);
    }

    public function test_count_afterRemoving(): void
    {
        $subject = new SimpleBasket();
        $subject->add('Test');
        $subject->remove('Test');

        $expected = 0;
        $actual = $subject->count();
        $this->assertEquals($expected, $actual);
    }

    public function test_getContents_empty(): void
    {
        $subject = new SimpleBasket();
        $actual = $subject->getContents();
        $expected = [];
        $this->assertEquals($expected, $actual);
    }

    public function test_getContents_afterAddingProduct(): void
    {
        $subject = new SimpleBasket();
        $subject->add('Test');
        $result = $subject->getContents();

        $this->assertContains('Test', $result);
    }
}
