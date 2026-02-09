<?php

declare(strict_types=1);

namespace ex2_carSpeedSensor\Tests;

use PHPUnit\Framework\TestCase;
use ex2_carSpeedSensor\CarSpeedSensor;

class CarSpeedSensorTest extends TestCase
{
    public function test_speedUnder30()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Molt lent", $sensor->getVelocity(29));
        $this->assertEquals("Molt lent", $sensor->getVelocity(10));
    }

    public function test_speedBetween31and60()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Velocitat adequada", $sensor->getVelocity(31));
        $this->assertEquals("Velocitat adequada", $sensor->getVelocity(60));
    }

    public function test_speedBetween61and80()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Excés lleu", $sensor->getVelocity(61));
        $this->assertEquals("Excés lleu", $sensor->getVelocity(80));
        $this->assertEquals("Excés lleu", $sensor->getVelocity(79));
    }

    public function test_speedBetween81and100()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Excés moderat", $sensor->getVelocity(82));
        $this->assertEquals("Excés moderat", $sensor->getVelocity(100));
        $this->assertEquals("Excés moderat", $sensor->getVelocity(99));
    }
    public function test_speedOver101()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Excés greu", $sensor->getVelocity(101));
        $this->assertEquals("Excés greu", $sensor->getVelocity(500));
    }

    public function testBoundaries()
    {
        $sensor = new CarSpeedSensor();

        // Boundary: 30
        $this->assertEquals("Velocitat adequada", $sensor->getVelocity(30));

        // Boundary: 60 (The very last 'adequate' speed)
        $this->assertEquals("Velocitat adequada", $sensor->getVelocity(60));

        // Boundary: 61 (The very first 'excess' speed)
        $this->assertEquals("Excés lleu", $sensor->getVelocity(61));
    }

    //when speedSensor reading don't make sense: 0 or negative or too high:

    public function testNegativeSpeedThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("velocitat NO pot ser negativa... !");

        $sensor = new CarSpeedSensor();
        $sensor->getVelocity(-10);
    }

    public function testZeroSpeedThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("El cotxe està parat...!");

        $sensor = new CarSpeedSensor();
        $sensor->getVelocity(0);
    }

    public function testExtremeHighSpeedThrowsException()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage("No rallys, thanks!");

        $sensor = new CarSpeedSensor();
        $sensor->getVelocity(30000);
    }

    //----------------------- LEVEL 2 : DATAPROVIDER ---------------------------//
    /**
     * @dataProvider speedProvider
     */

    public function testGetVelocityLogic(int $speed, string $expected)
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals($expected, $sensor->getVelocity($speed));
    }

    public static function speedProvider(): array
    {
        return [
            'border slow'     => [29, "Molt lent"],
            'border adequate' => [30, "Velocitat adequada"],
            'max adequate'    => [60, "Velocitat adequada"],
            'border excess'   => [61, "Excés lleu"],
            'max allowed'     => [500, "Excés greu"],
        ];
    }

    /**
     * @dataProvider exceptionProvider
     */

    public function testVelocityExceptions(int $speed, string $expectedMessage)
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage($expectedMessage);

        (new CarSpeedSensor())->getVelocity($speed);
    }

    public static function exceptionProvider(): array
    {
        return [
            'negative' => [-1, "velocitat NO pot ser negativa... !"],
            'stopped'  => [0, "El cotxe està parat...!"],
            'too fast' => [501, "No rallys, thanks!"],
        ];
    }
}
