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

    public function convert(string $result, int $digit): array
    {
        list($result, $digit) = $this->fireRuleIfPossible($digit, $result);

        return $this->nextRule->convert($result, $digit);
    }

    /**
     * @param int $digit
     * @param string $result
     * @return array
     */
    private function fireRuleIfPossible(int $digit, string $result): array
    {
        if ($this->ruleFire->isFiredFor($digit)) {
            $digit -= $this->digitValue;
            return array($result.$this->romanSymbol, $digit);
        }
        return array($result, $digit);
    }
}