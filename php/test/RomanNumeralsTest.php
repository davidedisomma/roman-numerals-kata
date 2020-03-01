<?php

namespace Kata\Test;

use Kata\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    public function testWhenDigitCorrespondToSingleRomanNumeral(): void
    {
        $this->assertSame('I', RomanNumerals::fromDigit(1));
        $this->assertSame('V', RomanNumerals::fromDigit(5));
        $this->assertSame('X', RomanNumerals::fromDigit(10));
        $this->assertSame('L', RomanNumerals::fromDigit(50));
        $this->assertSame('C', RomanNumerals::fromDigit(100));
        $this->assertSame('D', RomanNumerals::fromDigit(500));
        $this->assertSame('M', RomanNumerals::fromDigit(1000));
    }

    public function testDigitSmallerThan4(): void
    {
        $this->assertSame('II', RomanNumerals::fromDigit(2));
        $this->assertSame('III', RomanNumerals::fromDigit(3));
    }

    public function testDigitBetween4And8(): void
    {
        $this->assertSame('IV', RomanNumerals::fromDigit(4));
        $this->assertSame('VI', RomanNumerals::fromDigit(6));
        $this->assertSame('VII', RomanNumerals::fromDigit(7));
        $this->assertSame('VIII', RomanNumerals::fromDigit(8));
    }


}