<?php


namespace Kata;


class ConversionPowerOfTenToRomanSymbol implements ConversionDigitToRomanNumeral
{

    private $powerOfTen;
    private $romanSymbol;
    private ConversionRuleFire $ruleFire;

    public function __construct(int $powerOfTen, string $romanSymbol, ConversionRuleFire $ruleFire)
    {
        $this->powerOfTen = $powerOfTen;
        $this->romanSymbol = $romanSymbol;
        $this->ruleFire = $ruleFire;
    }

    public function convert(int $digit): array
    {
        if ($this->ruleFire->isFiredFor($digit)) {
            $howManyUnit = (int) ($digit / $this->powerOfTen);
            $digit -= $howManyUnit * $this->powerOfTen;

            return array(str_repeat($this->romanSymbol, $howManyUnit), $digit);
        }

        return array('', $digit);
    }
}