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
            list($partialResult, $digit) = (new ConversionPowerOfTenToRomanSymbol(1000, 'M'))->convert($digit);
            $result = $result.$partialResult;
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
            list($partialResult, $digit) = (new ConversionPowerOfTenToRomanSymbol(100, 'C'))->convert($digit);
            $result = $result.$partialResult;
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
            list($partialResult, $digit) = (new ConversionPowerOfTenToRomanSymbol(10, 'X'))->convert($digit);
            $result = $result.$partialResult;
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
            list($partialResult) = (new ConversionPowerOfTenToRomanSymbol(1, 'I'))->convert($digit);
            $result = $result.$partialResult;
        }
        return $result;
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