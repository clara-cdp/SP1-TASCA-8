<?php

use PHPUnit\Framework\TestCase;
use ex1_numberChecker\NumberChecker;

class numberCheckerTest extends \PHPUnit\Framework\TestCase
{
    //--------- test isEven() function --------------- 
    public function testEvenNumberPositive_isEven()
    {
        $n = new NumberChecker(4);
        $this->assertTrue($n->isEven());

        $n = new NumberChecker(12);
        $this->assertTrue($n->isEven());

        $n = new NumberChecker(328);
        $this->assertTrue($n->isEven());
    }

    public function testOddNumberPositive_isEven()
    {
        $n = new NumberChecker(5);
        $this->assertFalse($n->isEven());

        $n = new NumberChecker(1569);
        $this->assertFalse($n->isEven());

        $n = new NumberChecker(323);
        $this->assertFalse($n->isEven());
    }

    public function testEvenNumberNegative_isEven()
    {
        $n = new NumberChecker(-4);
        $this->assertTrue($n->isEven());

        $n = new NumberChecker(-12);
        $this->assertTrue($n->isEven());

        $n = new NumberChecker(-328);
        $this->assertTrue($n->isEven());
    }

    public function testOddNumberNegative_isEven()
    {
        $n = new NumberChecker(-79);
        $this->assertFalse($n->isEven());

        $n = new NumberChecker(-11);
        $this->assertFalse($n->isEven());

        $n = new NumberChecker(-11111);
        $this->assertFalse($n->isEven());
    }

    public function testZero_isEven()
    {
        $n = new NumberChecker(0);
        $this->assertTrue($n->isEven());
    }
    //--------- test isPositive() function --------------- 

    public function testNumberPositive_isPositive()
    {
        $n = new NumberChecker(8);
        $this->assertTrue($n->isPositive());

        $n = new NumberChecker(1489);
        $this->assertTrue($n->isPositive());

        $n = new NumberChecker(37);
        $this->assertTrue($n->isPositive());
    }

    public function testNumberNegative_isPositive()
    {
        $n = new NumberChecker(-3);
        $this->assertFalse($n->isPositive());

        $n = new NumberChecker(-12);
        $this->assertFalse($n->isPositive());

        $n = new NumberChecker(-985);
        $this->assertFalse($n->isPositive());
    }

    public function testZero_isPositive()
    {
        $n = new NumberChecker(0);
        $this->assertFalse($n->isPositive());
    }
}
