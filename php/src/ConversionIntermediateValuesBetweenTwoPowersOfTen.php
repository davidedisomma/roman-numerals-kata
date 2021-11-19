<?php


namespace Kata;


class ConversionIntermediateValuesBetweenTwoPowersOfTen implements ConversionDigitToRomanNumeral
{

    private int $digitValue;
    private string $romanSymbol;

    public function __construct(int $digitValue, string $romanSymbol)
    {
        $this->digitValue = $digitValue;
        $this->romanSymbol = $romanSymbol;
    }

    public function convert(int $digit): array
    {
        $digit -= $this->digitValue;
        return array($this->romanSymbol, $digit);
    }
}