<?php

namespace Kata;

final class RomanNumerals
{

    public static function fromDigit(int $digit): string
    {
        $result = '';
        if($digit < 40) {
            $howManyTen = (int)($digit / 10);
            for ($x = 1; $x <= $howManyTen; $x += 1) {
                $result = $result.'X';
            }
            $digit -= $howManyTen*10;
        }
        if($digit == 9) {
            return $result.'IX';
        }
        if($digit >= 5 && $digit <= 8) {
            $result = $result.'V';
            $digit -= 5;
        }
        if($digit == 4) {
            return 'IV';
        }
        if($digit <= 3) {
            return $result.self::convertWhenEqualOrLessThan3($digit);
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