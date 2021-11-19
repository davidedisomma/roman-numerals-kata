<?php


namespace Kata;


class LessThanValue implements ConversionRuleFire
{

    private $upperBound;

    public function __construct($upperBound)
    {
        $this->upperBound = $upperBound;
    }

    public function isFiredFor(int $digit): bool
    {
        return $digit < $this->upperBound;
    }
}