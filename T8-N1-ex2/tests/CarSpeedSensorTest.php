<?php

namespace ex2_carSpeedSensor\Tests;

use PHPUnit\Framework\TestCase;
use ex2_carSpeedSensor\CarSpeedSensor;

class CarSpeedSensorTest extends TestCase
{
    public function test_speedUnder30()
    {

        $sensor = new CarSpeedSensor();
        $velocity = $sensor->getVelocity(20);
        $this->assertEquals("Molt lent", $velocity);
    }
}


  /*  < 30 km/h: Molt lent
30-60 km/h: Velocitat adequada
61-80 km/h: Excés lleu
81-100 km/h: Excés moderat
> 100 km/h: Excés greu*/
