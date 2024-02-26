<?php

class ProductValidator {
    /**
     * Validates product codes
     * Returns true/false if a product code is/isn't valid
     *
     * Validation rules:
     * - Codes must be exactly 16 digits
     * - Must not start with _
     * - Must not end with z (case-insensitive)
     * - Must not contain a
     *
     * Example codes:
     *
     * Valid:
     * - 1BCDEFGHIJKLMNOP
     *
     * Invalid:
     * - BCDEFGHIJKLMNOPDEFC
     * - _BCDEFGHIJKLMNOP
     * - ABCDEFGHIJKLMNOZ
     * - ABCDEFGH-JKLMNOD
     */
    public function validate(string $code): bool
    {
        if (strlen($code) !== 16) {
            return false;
        }

        if (str_starts_with($code , '_')) {
            return false;
        }

        if (str_ends_with($code, 'z') || str_ends_with($code, 'Z')) {
            return false;
        }

        if (str_contains($code, '-')) {
            return false;
        }

        return true;
    }
}

$test = new ProductValidator();

var_dump($test->validate('ABCDEFGH-JKLMNOD'));