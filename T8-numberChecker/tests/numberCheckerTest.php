<?php

declare(strict_types=1); // added strict types!!

use PHPUnit\Framework\TestCase;
use ex1_numberChecker\NumberChecker;

class numberCheckerTest extends \PHPUnit\Framework\TestCase
{
    //--------- Tests for isEven() --------------- 

    public function testIsEvenIsTrueForEvenNumbers()
    {
        //positive is EVEN
        $n1 = new NumberChecker(4);
        $this->assertTrue($n1->isEven());

        // Negative is EVEN
        $n2 = new NumberChecker(-12);
        $this->assertTrue($n2->isEven());

        // Zero is EVEN
        $n3 = new NumberChecker(0);
        $this->assertTrue($n3->isEven());
    }

    public function testIsEvenisFalseForOddNumbers()
    {
        //positive is ODD
        $n1 = new NumberChecker(5);
        $this->assertFalse($n1->isEven());

        // Negative is ODD
        $n2 = new NumberChecker(-79);
        $this->assertFalse($n2->isEven());

        // Largest possible integer is ODD -> (conflictive case)
        $n3 = new NumberChecker(PHP_INT_MAX);
        $this->assertFalse($n3->isEven());
    }
    //--------- test isPositive() function --------------- 

    public function testPositiveIsTrueForPositiveNumbers()
    {
        //positive
        $n1 = new NumberChecker(8);
        $this->assertTrue($n1->isPositive());

        // The largest integer -> (conflictive case)
        $n2 = new NumberChecker(PHP_INT_MAX);
        $this->assertTrue($n2->isPositive());
    }

    public function testIsPositiveIsFalseForNegativeNumbers()
    {
        // Negative
        $n1 = new NumberChecker(-3);
        $this->assertFalse($n1->isPositive());

        // Zero -> (conflictive case)
        $n2 = new NumberChecker(0);
        $this->assertFalse($n2->isPositive());

        // Smallest possible integer -> (conflictive case)
        $n3 = new NumberChecker(PHP_INT_MIN);
        $this->assertFalse($n3->isPositive());
    }

    //--------- Type Safety Test --------------- 

    public function testFloatThrowsError()
    {
        $this->expectException(\TypeError::class);
        $trickyOne = 2.5;
        $n = new NumberChecker($trickyOne);
        // $n = new NumberChecker((int) $trickyOne); // :) hehe
    }

    // ------------------- LEVEL 2 : DATAPROVIDERS --------------------------

    /**
     * @dataProvider evenNumbersProvider
     */

    public function testIsEvenCases(int $number, bool $expected)
    {
        $n = new NumberChecker($number);
        $this->assertEquals($expected, $n->isEven(), "$number, FAILED");
    }

    public static function evenNumbersProvider(): array
    {
        return [
            'positive even' => [4, true],
            'positive odd'  => [5, false],
            'zero'          => [0, true],
            'negative even' => [-12, true],
            'negative odd'  => [-79, false],
            'max integer'   => [PHP_INT_MAX, false],
        ];
    }

    /**
     *  @dataProvider positiveNumbersProvider
     */


    public function testIsPositiveCases(int $number, bool $expected)
    {
        $n = new NumberChecker($number);
        $this->assertEquals($expected, $n->isPositive(), "$number, FAILED");
    }

    public static function positiveNumbersProvider(): array
    {
        return [
            'positive' => [2, true],
            'The largest integer' => [PHP_INT_MAX, true],
            'Negative' => [-3, false],
            'Zero' => [0, false],
            'Smallest possible integer' => [PHP_INT_MIN, false]
        ];
    }
}
