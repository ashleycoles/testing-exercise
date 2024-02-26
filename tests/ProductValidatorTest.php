<?php

require_once 'src/ProductValidator.php';

use PHPUnit\Framework\TestCase;

class ProductValidatorTest extends TestCase {
    public function test_validate_valid(): void
    {
        $subject = new ProductValidator();
        $actual = $subject->validate('1BCDEFGHIJKLMNOP');

        $this->assertTrue($actual);
    }

    public function test_validate_invalidLength(): void
    {
        $subject = new ProductValidator();
        $actual = $subject->validate('1BCDEFGHIJKLMNOP1BCDEFGHIJKLMNOP');

        $this->assertFalse($actual);
    }

    public function test_validate_invalidStart(): void
    {
        $subject = new ProductValidator();
        $actual = $subject->validate('_BCDEFGHIJKLMNOP');

        $this->assertFalse($actual);
    }

    public function test_validate_invalidEnd(): void
    {
        $subject = new ProductValidator();
        $actual = $subject->validate('ABCDEFGHIJKLMNOZ');

        $this->assertFalse($actual);
    }

    public function test_validate_invalidCharacter(): void
    {
        $subject = new ProductValidator();
        $actual = $subject->validate('ABCDEFGH-JKLMNOD');

        $this->assertFalse($actual);
    }
}