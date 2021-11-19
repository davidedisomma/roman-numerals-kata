<?php


namespace Kata;


class EqualToValue implements ConversionRuleFire
{

    private int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function isFiredFor(int $digit): bool
    {
        return $this->value == $digit;
    }
}