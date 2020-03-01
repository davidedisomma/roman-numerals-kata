<?php

namespace Kata;

use PHPUnit\Util\Exception;

final class RomanNumerals
{

    public static function fromDigit(int $digit): string
    {
        switch ($digit) {
            case 1:
                return 'I';
            case 5:
                return 'V';
            case 10:
                return 'X';
            case 50:
                return 'L';
            case 100:
                return 'C';
            case 500:
                return 'D';
            case 1000:
                return 'M';
            default:
                throw new Exception("Unexpected digit $digit");
        }
    }
}