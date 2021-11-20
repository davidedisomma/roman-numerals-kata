<?php

namespace Kata\Test;

use InvalidArgumentException;
use Kata\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    private RomanNumerals $romanNumerals;

    protected function setUp(): void
    {
        $this->romanNumerals = RomanNumerals::getInstance();
    }

    public function testDigitSmallerThan4(): void
    {
        $this->assertSame('II', $this->romanNumerals->fromDigit(2));
        $this->assertSame('III', $this->romanNumerals->fromDigit(3));
    }

    public function testDigitBetween4And8(): void
    {
        $this->assertSame('IV', $this->romanNumerals->fromDigit(4));
        $this->assertSame('VI', $this->romanNumerals->fromDigit(6));
        $this->assertSame('VII', $this->romanNumerals->fromDigit(7));
        $this->assertSame('VIII', $this->romanNumerals->fromDigit(8));
    }

    public function testDigitBetween9And39(): void
    {
        $this->assertSame('IX', $this->romanNumerals->fromDigit(9));
        $this->assertSame('XIII', $this->romanNumerals->fromDigit(13));
        $this->assertSame('XVII', $this->romanNumerals->fromDigit(17));
        $this->assertSame('XXII', $this->romanNumerals->fromDigit(22));
        $this->assertSame('XXIV', $this->romanNumerals->fromDigit(24));
        $this->assertSame('XXIX', $this->romanNumerals->fromDigit(29));
        $this->assertSame('XXXV', $this->romanNumerals->fromDigit(35));
        $this->assertSame('XXXVIII', $this->romanNumerals->fromDigit(38));
        $this->assertSame('XXXIX', $this->romanNumerals->fromDigit(39));
    }

    public function testDigitBetween40And89(): void
    {
        $this->assertSame('XL', $this->romanNumerals->fromDigit(40));
        $this->assertSame('XLI', $this->romanNumerals->fromDigit(41));
        $this->assertSame('L', $this->romanNumerals->fromDigit(50));
        $this->assertSame('LXVII', $this->romanNumerals->fromDigit(67));
        $this->assertSame('LXXIV', $this->romanNumerals->fromDigit(74));
        $this->assertSame('LXXVIII', $this->romanNumerals->fromDigit(78));
        $this->assertSame('LXXXIX', $this->romanNumerals->fromDigit(89));
    }

    public function testDigitBetween90And399(): void
    {
        $this->assertSame('XC', $this->romanNumerals->fromDigit(90));
        $this->assertSame('XCI', $this->romanNumerals->fromDigit(91));
        $this->assertSame('C', $this->romanNumerals->fromDigit(100));
        $this->assertSame('CLXVII', $this->romanNumerals->fromDigit(167));
        $this->assertSame('CCXCVII', $this->romanNumerals->fromDigit(297));
        $this->assertSame('CCCXCIX', $this->romanNumerals->fromDigit(399));
    }

    public function testDigitBetween400And899(): void
    {
        $this->assertSame('CD', $this->romanNumerals->fromDigit(400));
        $this->assertSame('CDLXXXII', $this->romanNumerals->fromDigit(482));
        $this->assertSame('D', $this->romanNumerals->fromDigit(500));
        $this->assertSame('DLXVII', $this->romanNumerals->fromDigit(567));
        $this->assertSame('DCCXCVII', $this->romanNumerals->fromDigit(797));
        $this->assertSame('DCCCXCIX', $this->romanNumerals->fromDigit(899));
    }

    public function testDigitBetween900And3000(): void
    {
        $this->assertSame('CM', $this->romanNumerals->fromDigit(900));
        $this->assertSame('CMXCIX', $this->romanNumerals->fromDigit(999));
        $this->assertSame('M', $this->romanNumerals->fromDigit(1000));
        $this->assertSame('MCMLXXXIX', $this->romanNumerals->fromDigit(1989));
        $this->assertSame('MMCDXLIX', $this->romanNumerals->fromDigit(2449));
        $this->assertSame('MMM', $this->romanNumerals->fromDigit(3000));
    }

    public function testReturnErrorWhenDigitIsOverflown(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $this->romanNumerals->fromDigit(-1);
        $this->romanNumerals->fromDigit(0);
        $this->romanNumerals->fromDigit(3001);
        $this->romanNumerals->fromDigit(12345678);
        $this->romanNumerals->fromDigit(null);
    }


}