<?php


namespace Kata;


interface ConversionRuleFire
{

    public function isFiredFor(int $digit): bool;
}