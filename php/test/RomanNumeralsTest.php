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
        $this->assertSame('XXIV', RomanNumerals::fromDigit(24));
        $this->assertSame('XXIX', RomanNumerals::fromDigit(29));
        $this->assertSame('XXXV', RomanNumerals::fromDigit(35));
        $this->assertSame('XXXVIII', RomanNumerals::fromDigit(38));
        $this->assertSame('XXXIX', RomanNumerals::fromDigit(39));
    }

    public function testDigitBetween40And89(): void
    {
        $this->assertSame('XL', RomanNumerals::fromDigit(40));
        $this->assertSame('XLI', RomanNumerals::fromDigit(41));
        $this->assertSame('L', RomanNumerals::fromDigit(50));
        $this->assertSame('LXVII', RomanNumerals::fromDigit(67));
        $this->assertSame('LXXIV', RomanNumerals::fromDigit(74));
        $this->assertSame('LXXVIII', RomanNumerals::fromDigit(78));
        $this->assertSame('LXXXIX', RomanNumerals::fromDigit(89));
    }

    public function testDigitBetween90And399(): void
    {
        $this->assertSame('XC', RomanNumerals::fromDigit(90));
        $this->assertSame('XCI', RomanNumerals::fromDigit(91));
        $this->assertSame('C', RomanNumerals::fromDigit(100));
        $this->assertSame('CLXVII', RomanNumerals::fromDigit(167));
        $this->assertSame('CCXCVII', RomanNumerals::fromDigit(297));
        $this->assertSame('CCCXCIX', RomanNumerals::fromDigit(399));
    }

    public function testDigitBetween400And899(): void
    {
        $this->assertSame('CD', RomanNumerals::fromDigit(400));
        $this->assertSame('CDLXXXII', RomanNumerals::fromDigit(482));
        $this->assertSame('D', RomanNumerals::fromDigit(500));
        $this->assertSame('DLXVII', RomanNumerals::fromDigit(567));
        $this->assertSame('DCCXCVII', RomanNumerals::fromDigit(797));
        $this->assertSame('DCCCXCIX', RomanNumerals::fromDigit(899));
    }

}