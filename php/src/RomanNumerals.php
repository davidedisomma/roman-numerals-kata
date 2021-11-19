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
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(900, 'CM'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit >= 500 && $digit < 900) {
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(500, 'D'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit >= 400 && $digit < 500) {
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(400, 'CD'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit >= 100 && $digit < 400) {
            list($partialResult, $digit) = (new ConversionPowerOfTenToRomanSymbol(100, 'C'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit >= 90 && $digit < 100) {
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(90, 'XC'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit >= 50 && $digit < 90) {
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(50, 'L'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit >= 40 && $digit < 50) {
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(40, 'XL'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit < 40) {
            list($partialResult, $digit) = (new ConversionPowerOfTenToRomanSymbol(10, 'X'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit == 9) {
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(9, 'IX'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit >= 5 && $digit <= 8) {
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(5, 'V'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit == 4) {
            list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(4, 'IV'))->convert($digit);
            $result = $result.$partialResult;
        }
        if($digit <= 3) {
            list($partialResult) = (new ConversionPowerOfTenToRomanSymbol(1, 'I'))->convert($digit);
            $result = $result.$partialResult;
        }
        return $result;
    }
}