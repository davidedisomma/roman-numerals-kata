<?php


namespace Kata;


class ConversionPowerOfTenToRomanSymbol implements ConversionDigitToRomanNumeral
{

    private $powerOfTen;
    private $romanSymbol;

    public function __construct(int $powerOfTen, string $romanSymbol)
    {
        $this->powerOfTen = $powerOfTen;
        $this->romanSymbol = $romanSymbol;
    }

    public function convert(int $digit): array
    {
        $howManyUnit = (int) ($digit / $this->powerOfTen);
        $digit -= $howManyUnit * $this->powerOfTen;

        return array(str_repeat($this->romanSymbol, $howManyUnit), $digit);
    }
}