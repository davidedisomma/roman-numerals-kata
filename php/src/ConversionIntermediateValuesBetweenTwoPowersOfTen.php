<?php


namespace Kata;


class ConversionIntermediateValuesBetweenTwoPowersOfTen implements ConversionDigitToRomanNumeral
{

    private int $digitValue;
    private string $romanSymbol;
    private ?ConversionRuleFire $ruleFire;

    public function __construct(int $digitValue, string $romanSymbol, ?ConversionRuleFire $ruleFire = null)
    {
        $this->digitValue = $digitValue;
        $this->romanSymbol = $romanSymbol;
        $this->ruleFire = $ruleFire;
    }

    public function convert(int $digit): array
    {
        if($this->ruleFire != null) {
            if($this->ruleFire->isFiredFor($digit)) {
                $digit -= $this->digitValue;
                return array($this->romanSymbol, $digit);
            }
            return array('', $digit);
        }
        $digit -= $this->digitValue;
        return array($this->romanSymbol, $digit);
    }
}