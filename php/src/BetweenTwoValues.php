<?php


namespace Kata;


class BetweenTwoValues implements ConversionRuleFire
{

    private int $lowerBound;
    private int $upperBound;

    public function __construct(int $lowerBound, int $upperBound)
    {
        $this->lowerBound = $lowerBound;
        $this->upperBound = $upperBound;
    }

    public function isFiredFor(int $digit): bool
    {
        return $digit >= $this->lowerBound && $digit <= $this->upperBound;
    }
}