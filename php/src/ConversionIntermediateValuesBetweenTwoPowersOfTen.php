<?php


namespace Kata;


class ConversionIntermediateValuesBetweenTwoPowersOfTen implements ConversionDigitToRomanNumeral
{

    private int $digitValue;
    private string $romanSymbol;
    private ConversionRuleFire $ruleFire;
    private ConversionDigitToRomanNumeral $nextRule;

    public function __construct(int $digitValue, string $romanSymbol, ConversionRuleFire $ruleFire, ConversionDigitToRomanNumeral $nextRule)
    {
        $this->digitValue = $digitValue;
        $this->romanSymbol = $romanSymbol;
        $this->ruleFire = $ruleFire;
        $this->nextRule = $nextRule;
    }

    public function convert(int $digit): string
    {
        $romanNumeral = '';
        if ($this->ruleFire->isFiredFor($digit)) {
            $digit -= $this->digitValue;
            $romanNumeral = $this->romanSymbol;
        }

        return $romanNumeral.$this->nextRule->convert($digit);
    }
}