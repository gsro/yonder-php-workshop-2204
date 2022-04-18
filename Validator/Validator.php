<?php

declare(strict_types = 1);

namespace App\Validator;

use InvalidArgumentException;

class Validator
{
    public static function validateLength(string $value, int $length = 10): void
    {
        if (strlen($value) > $length) {
            throw new InvalidArgumentException("$value should be maximum $length characters");
        }
    }

    public static function validateBlank(string $value): void
    {
        if (strlen($value) === 0) {
            throw new InvalidArgumentException("$value should be at list 1 characters");
        }
    }

    public static function validatePositiveNumber(int $value): void
    {
        if ($value < 0) {
            throw new InvalidArgumentException("$value should be at least 0");
        }
    }
}
