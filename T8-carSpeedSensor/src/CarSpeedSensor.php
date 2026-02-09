<?php

namespace ex2_carSpeedSensor;

class CarSpeedSensor
{

    public function getVelocity(int $speed): string
    {
        return match (true) {
            $speed < 30 => "Molt lent",
            $speed <= 60 => "Velocitat adequada",
            $speed <= 80 => "Excés lleu",
            $speed <= 100 => "Excés moderat",
            default =>  "Excés greu",
        };
    }
}
