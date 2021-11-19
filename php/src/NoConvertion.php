<?php


namespace Kata;


class NoConvertion implements ConversionDigitToRomanNumeral
{

    public function convert(int $digit): array
    {
        return array('', 0);
    }
}