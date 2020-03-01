<?php

namespace Kata\Test;

use Kata\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
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

    public function testDigitBetween9And39(): void
    {
        $this->assertSame('IX', RomanNumerals::fromDigit(9));
        $this->assertSame('XIII', RomanNumerals::fromDigit(13));
        $this->assertSame('XVII', RomanNumerals::fromDigit(17));
        $this->assertSame('XXII', RomanNumerals::fromDigit(22));
        $this->assertSame('XXIX', RomanNumerals::fromDigit(29));
        $this->assertSame('XXXV', RomanNumerals::fromDigit(35));
        $this->assertSame('XXXVIII', RomanNumerals::fromDigit(38));
    }


}