<?php

namespace Kata;

use PHPUnit\Util\Exception;

final class RomanNumerals
{

    public static function fromDigit(int $digit): string
    {
        if($digit <= 3) {
            return self::convertWhenLessThan4($digit);
        }
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

    private static function convertWhenLessThan4(int $digit): string
    {
        $result = '';
        for ($x = 1; $x <= $digit; $x += 1) {
            $result = $result.'I';
        }
        return $result;
    }
}