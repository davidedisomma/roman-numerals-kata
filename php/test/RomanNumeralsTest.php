<?php

namespace Kata\Test;

use Kata\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    public function testFromDigit(): void
    {
        $this->assertSame('I', RomanNumerals::fromDigit(1));
    }


}