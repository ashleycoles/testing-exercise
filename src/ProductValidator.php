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
     */
    public function validate(string $code): bool
    {
        if (strlen($code) !== 16) {
            return false;
        }

        if (str_starts_with($code , '_') || st) {
            return false;
        }

        if (str_ends_with($code, 'z')) {
            return false;
        }

        return true;
    }
}