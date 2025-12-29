<?php

namespace ex2_carSpeedSensor\Tests;

use PHPUnit\Framework\TestCase;
use ex2_carSpeedSensor\CarSpeedSensor;

class CarSpeedSensorTest extends TestCase
{
    public function test_speedUnder30()
    {

        $sensor = new CarSpeedSensor();

        $this->assertEquals("Molt lent", $sensor->getVelocity(3));
        $this->assertEquals("Molt lent", $sensor->getVelocity(10));
        $this->assertEquals("Molt lent", $sensor->getVelocity(26));
    }


    public function test_speedBetween31and60()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Velocitat adequada", $sensor->getVelocity(30));
        $this->assertEquals("Velocitat adequada", $sensor->getVelocity(45));
        $this->assertEquals("Velocitat adequada", $sensor->getVelocity(60));
    }

    public function test_speedBetween61and80()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Excés lleu", $sensor->getVelocity(61));
        $this->assertEquals("Excés lleu", $sensor->getVelocity(72));
        $this->assertEquals("Excés lleu", $sensor->getVelocity(79));
    }

    public function test_speedBetween81and100()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Excés moderat", $sensor->getVelocity(82));
        $this->assertEquals("Excés moderat", $sensor->getVelocity(89));
        $this->assertEquals("Excés moderat", $sensor->getVelocity(99));
    }
    public function test_speedOver101()
    {
        $sensor = new CarSpeedSensor();
        $this->assertEquals("Excés greu", $sensor->getVelocity(102));
        $this->assertEquals("Excés greu", $sensor->getVelocity(220));
        $this->assertEquals("Excés greu", $sensor->getVelocity(150));
    }
}



  /*  < 30 km/h: Molt lent
30-60 km/h: Velocitat adequada
61-80 km/h: Excés lleu
81-100 km/h: Excés moderat
> 100 km/h: Excés greu*/
