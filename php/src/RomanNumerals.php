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
        list($partialResult, $digit) = (new ConversionPowerOfTenToRomanSymbol(1000, 'M', new BetweenTwoValues(1000, 3000)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(900, 'CM', new BetweenTwoValuesUpperBoundExcluded(900, 1000)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(500, 'D', new BetweenTwoValuesUpperBoundExcluded(500, 900)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(400, 'CD', new BetweenTwoValuesUpperBoundExcluded(400, 500)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionPowerOfTenToRomanSymbol(100, 'C', new BetweenTwoValuesUpperBoundExcluded(100, 400)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(90, 'XC', new BetweenTwoValuesUpperBoundExcluded(90, 100)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(50, 'L', new BetweenTwoValuesUpperBoundExcluded(50, 90)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(40, 'XL', new BetweenTwoValuesUpperBoundExcluded(40, 50)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionPowerOfTenToRomanSymbol(10, 'X', new LessThanValue(40)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(9, 'IX', new EqualToValue(9)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(5, 'V', new BetweenTwoValues(5, 8)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult, $digit) = (new ConversionIntermediateValuesBetweenTwoPowersOfTen(4, 'IV', new EqualToValue(4)))->convert($digit);
        $result = $result.$partialResult;

        list($partialResult) = (new ConversionPowerOfTenToRomanSymbol(1, 'I', new BetweenTwoValues(0, 3)))->convert($digit);
        return $result.$partialResult;
    }
}