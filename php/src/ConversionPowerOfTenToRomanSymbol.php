<?php


namespace Kata;


class ConversionPowerOfTenToRomanSymbol implements ConversionDigitToRomanNumeral
{

    private $powerOfTen;
    private $romanSymbol;
    private ConversionRuleFire $ruleFire;
    private ConversionDigitToRomanNumeral $nextRule;


    public function __construct(int $powerOfTen, string $romanSymbol, ConversionRuleFire $ruleFire, ConversionDigitToRomanNumeral $nextRule)
    {
        $this->powerOfTen = $powerOfTen;
        $this->romanSymbol = $romanSymbol;
        $this->ruleFire = $ruleFire;
        $this->nextRule = $nextRule;
    }

    public function convert(int $digit): string
    {
        $romanNumeral = '';
        if ($this->ruleFire->isFiredFor($digit)) {
            $howManyUnit = (int) ($digit / $this->powerOfTen);
            $digit -= $howManyUnit * $this->powerOfTen;

            $romanNumeral = str_repeat($this->romanSymbol, $howManyUnit);
        }

        return $romanNumeral.$this->nextRule->convert($digit);
    }

}