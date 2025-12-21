<?php
require_once 'numberChecker.php';

class numberCheckerTest extends \PHPUnit\Framework\TestCase
{

    public function testEvenNumberPositive()
    {
        $number1 = new NumberChecker(5);
        $this->assertTrue($number1->isEven());
    }
}
