<?php


namespace Kata;


use InvalidArgumentException;

class ValidationRule implements ConversionDigitToRomanNumeral
{
    private int $lowerBound;
    private int $upperBound;
    private ConversionDigitToRomanNumeral $nextRule;

    public function __construct(int $lowerBound, int $upperBound, ConversionDigitToRomanNumeral $nextRule)
    {
        $this->lowerBound = $lowerBound;
        $this->upperBound = $upperBound;
        $this->nextRule = $nextRule;
    }

    public function convert(int $digit): string
    {
        if($digit <= $this->lowerBound || $digit > $this->upperBound) {
            throw new InvalidArgumentException("Digit $digit is overflown");
        }
        return $this->nextRule->convert($digit);
    }
}