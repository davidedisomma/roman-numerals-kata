<?php

namespace Kata;


use InvalidArgumentException;

final class RomanNumerals
{
    /**
     * @return array<ConversionDigitToRomanNumeral>
     */
    private static function rules(): array
    {
        return [
            new ConversionPowerOfTenToRomanSymbol(1000, 'M', new BetweenTwoValues(1000, 3000)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(900, 'CM', new BetweenTwoValuesUpperBoundExcluded(900, 1000)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(500, 'D', new BetweenTwoValuesUpperBoundExcluded(500, 900)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(400, 'CD', new BetweenTwoValuesUpperBoundExcluded(400, 500)),
            new ConversionPowerOfTenToRomanSymbol(100, 'C', new BetweenTwoValuesUpperBoundExcluded(100, 400)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(90, 'XC', new BetweenTwoValuesUpperBoundExcluded(90, 100)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(50, 'L', new BetweenTwoValuesUpperBoundExcluded(50, 90)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(40, 'XL', new BetweenTwoValuesUpperBoundExcluded(40, 50)),
            new ConversionPowerOfTenToRomanSymbol(10, 'X', new LessThanValue(40)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(9, 'IX', new EqualToValue(9)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(5, 'V', new BetweenTwoValues(5, 8)),
            new ConversionIntermediateValuesBetweenTwoPowersOfTen(4, 'IV', new EqualToValue(4)),
            new ConversionPowerOfTenToRomanSymbol(1, 'I', new BetweenTwoValues(0, 3))
        ];
    }

    public static function fromDigit(int $digit): string
    {
        if($digit <= 0 || $digit >3000) {
            throw new InvalidArgumentException("Digit $digit is overflown");
        }
        $result = '';
        foreach (self::rules() as $rule) {
            list($result, $digit) = $rule->convert($result, $digit);
        }
        return $result;
    }
}