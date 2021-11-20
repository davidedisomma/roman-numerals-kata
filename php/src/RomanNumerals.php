<?php

namespace Kata;


use InvalidArgumentException;

final class RomanNumerals
{
    /**
     * @return ConversionDigitToRomanNumeral
     */
    private static function rules(): ConversionDigitToRomanNumeral
    {
        $until3Rule = new ConversionPowerOfTenToRomanSymbol(1, 'I', new BetweenTwoValues(0, 3), new NoConvertion());
        $fourRule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(4, 'IV', new EqualToValue(4), $until3Rule);
        $between5And8Rule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(5, 'V', new BetweenTwoValues(5, 8), $fourRule);
        $nineRule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(9, 'IX', new EqualToValue(9), $between5And8Rule);
        $lessThan40Rule = new ConversionPowerOfTenToRomanSymbol(10, 'X', new LessThanValue(40), $nineRule);
        $between40And50Rule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(40, 'XL', new BetweenTwoValuesUpperBoundExcluded(40, 50), $lessThan40Rule);
        $between50And90Rule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(50, 'L', new BetweenTwoValuesUpperBoundExcluded(50, 90), $between40And50Rule);
        $between90And100Rule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(90, 'XC', new BetweenTwoValuesUpperBoundExcluded(90, 100), $between50And90Rule);
        $between100And400Rule = new ConversionPowerOfTenToRomanSymbol(100, 'C', new BetweenTwoValuesUpperBoundExcluded(100, 400), $between90And100Rule);
        $between400And500Rule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(400, 'CD', new BetweenTwoValuesUpperBoundExcluded(400, 500), $between100And400Rule);
        $between500And900Rule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(500, 'D', new BetweenTwoValuesUpperBoundExcluded(500, 900), $between400And500Rule);
        $between900And1000Rule = new ConversionIntermediateValuesBetweenTwoPowersOfTen(900, 'CM', new BetweenTwoValuesUpperBoundExcluded(900, 1000), $between500And900Rule);
        $between1000And3000Rule = new ConversionPowerOfTenToRomanSymbol(1000, 'M', new BetweenTwoValues(1000, 3000), $between900And1000Rule);
        return new ValidationRule(0, 3000, $between1000And3000Rule);
    }

    public static function fromDigit(int $digit): string
    {
        return self::rules()->convert($digit);
    }
}