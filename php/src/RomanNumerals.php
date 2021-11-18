<?php

namespace Kata;


use InvalidArgumentException;

final class RomanNumerals
{

    public static function fromDigit(int $digit): string
    {
        if($digit <= 0 || $digit >3000) {
            throw new InvalidArgumentException("Digit $digit is overflown");
        }
        $result = '';
        if($digit >= 1000 && $digit <= 3000) {
            list($result, $digit) = (RomanNumerals::convertPowerOfTenToRomanSymbol(1000, 'M', $digit, $result));
        }
        if($digit >= 900 && $digit < 1000) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(900, 'CM', $result, $digit);
        }
        if($digit >= 500 && $digit < 900) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(500, 'D', $result, $digit);
        }
        if($digit >= 400 && $digit < 500) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(400, 'CD', $result, $digit);
        }
        if($digit >= 100 && $digit < 400) {
            list($result, $digit) = (RomanNumerals::convertPowerOfTenToRomanSymbol(100, 'C', $digit, $result));
        }
        if($digit >= 90 && $digit < 100) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(90, 'XC', $result, $digit);
        }
        if($digit >= 50 && $digit < 90) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(50, 'L', $result, $digit);
        }
        if($digit >= 40 && $digit < 50) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(40, 'XL', $result, $digit);
        }
        if($digit < 40) {
            list($result, $digit) = (RomanNumerals::convertPowerOfTenToRomanSymbol(10, 'X', $digit, $result));
        }
        if($digit == 9) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(9, 'IX', $result, $digit);
        }
        if($digit >= 5 && $digit <= 8) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(5, 'V', $result, $digit);
        }
        if($digit == 4) {
            list($result, $digit) = self::convertIntermediateValuesBetweenTwoPowersOfTen(4, 'IV', $result, $digit);
        }
        if($digit <= 3) {
            list($result) = (RomanNumerals::convertPowerOfTenToRomanSymbol(1, 'I', $digit, $result));
        }
        return $result;
    }

    /**
     * @return array<mixed>
     */
    private static function convertPowerOfTenToRomanSymbol(int $powerOfTen, string $romanSymbol, int $digit, string $result): array
    {
        $howManyUnit = (int) ($digit / $powerOfTen);
        $result = $result.str_repeat($romanSymbol, $howManyUnit);
        $digit -= $howManyUnit * $powerOfTen;
        return array($result, $digit);
    }

    /**
     * @return array<mixed>
     */
    private static function convertIntermediateValuesBetweenTwoPowersOfTen(int $digitValue, string $romanSymbol, string $result, int $digit): array
    {
        $result = $result.$romanSymbol;
        $digit -= $digitValue;
        return array($result, $digit);
    }
}