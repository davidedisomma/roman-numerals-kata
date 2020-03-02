<?php

namespace Kata;

final class RomanNumerals
{

    public static function fromDigit(int $digit): string
    {
        $result = '';
        if($digit >= 100 && $digit < 400) {
            list($result, $digit) = self::convertWhenBetween100and400($digit, $result);
        }
        if($digit >= 90 && $digit < 100) {
            $result = $result.'XC';
            $digit -= 90;
        }
        if($digit >= 50 && $digit < 90) {
            $result = $result.'L';
            $digit -= 50;
        }
        if($digit >= 40 && $digit < 50) {
            $result = $result.'XL';
            $digit -= 40;
        }
        if($digit < 40) {
            list($result, $digit) = self::convertWhenBetween9and39($digit, $result);
        }
        if($digit == 9) {
            return $result.'IX';
        }
        if($digit >= 5 && $digit <= 8) {
            $result = $result.'V';
            $digit -= 5;
        }
        if($digit == 4) {
            return $result.'IV';
        }
        if($digit <= 3) {
            return $result.self::convertWhenEqualOrLessThan3($digit);
        }
        return $result;
    }

    private static function convertWhenEqualOrLessThan3(int $digit): string
    {
        return str_repeat('I', $digit);
    }

    /**
     * @param int $digit
     * @param string $result
     * @return array
     */
    private static function convertWhenBetween9and39(int $digit, string $result): array
    {
        $howManyTen = (int) ($digit / 10);
        $result = $result.str_repeat('X', $howManyTen);
        $digit -= $howManyTen * 10;
        return array($result, $digit);
    }

    private static function convertWhenBetween100and400(int $digit, string $result): array
    {
        $howManyHendred = (int) ($digit / 100);
        $result = $result.str_repeat('C', $howManyHendred);
        $digit -= $howManyHendred * 100;
        return array($result, $digit);
    }
}