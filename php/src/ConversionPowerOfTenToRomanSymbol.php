<?php


namespace Kata;


class ConversionPowerOfTenToRomanSymbol implements ConversionDigitToRomanNumeral
{

    private $powerOfTen;
    private $romanSymbol;
    private ConversionRuleFire $ruleFire;
    private ?ConversionDigitToRomanNumeral $nextRule;


    public function __construct(int $powerOfTen, string $romanSymbol, ConversionRuleFire $ruleFire, ?ConversionDigitToRomanNumeral $nextRule = null)
    {
        $this->powerOfTen = $powerOfTen;
        $this->romanSymbol = $romanSymbol;
        $this->ruleFire = $ruleFire;
        $this->nextRule = $nextRule;
    }

    public function convert(string $result, int $digit): array
    {
        list($result, $digit) = $this->fireRuleIfPossible($digit, $result);
        if($this->nextRule !== null) {
            return $this->nextRule->convert($result, $digit);
        }

        return array($result, $digit);
    }

    /**
     * @param int $digit
     * @param string $result
     * @return array
     */
    private function fireRuleIfPossible(int $digit, string $result): array
    {
        if ($this->ruleFire->isFiredFor($digit)) {
            $howManyUnit = (int) ($digit / $this->powerOfTen);
            $digit -= $howManyUnit * $this->powerOfTen;

            return array($result.str_repeat($this->romanSymbol, $howManyUnit), $digit);
        }

        return array($result, $digit);
    }
}