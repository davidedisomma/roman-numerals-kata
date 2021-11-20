<?php


namespace Kata;


class NoConvertion implements ConversionDigitToRomanNumeral
{

    public function convert(string $result, int $digit): array
    {
        return array($result, 0);
    }
}