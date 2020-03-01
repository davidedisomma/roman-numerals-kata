<?php

namespace Kata;

use PHPUnit\Util\Exception;

final class RomanNumerals
{

    public static function fromDigit(int $digit): string
    {
        if($digit <= 3) {
            return self::convertWhenEqualOrLessThan3($digit);
        }
        if($digit == 4) {
            return 'IV';
        }
        if($digit >= 5 && $digit <= 8) {
            return self::convertWhenBetween5And8($digit);
        }
        switch ($digit) {
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

    private static function convertWhenEqualOrLessThan3(int $digit): string
    {
        $result = '';
        for ($x = 1; $x <= $digit; $x += 1) {
            $result = $result.'I';
        }
        return $result;
    }

    /**
     * @param int $digit
     * @return string
     */
    private static function convertWhenBetween5And8(int $digit): string
    {
        $result = 'V';
        for ($x = 1; $x <= ($digit % 5); $x += 1) {
            $result = $result.'I';
        }
        return $result;
    }
}