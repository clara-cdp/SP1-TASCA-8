<?php

namespace ex2_carSpeedSensor;

class CarSpeedSensor
{

    public function getVelocity(int $speed): string
    {
        if ($speed < 0) {
            throw new \InvalidArgumentException("velocitat NO pot ser negativa... !");
        }

        if ($speed === 0) {
            throw new \InvalidArgumentException("El cotxe està parat...!");
        }

        if ($speed > 500) {
            throw new \InvalidArgumentException("No rallys, thanks!");
        }

        return match (true) {
            $speed < 30 => "Molt lent",
            $speed <= 60 => "Velocitat adequada",
            $speed <= 80 => "Excés lleu",
            $speed <= 100 => "Excés moderat",
            default =>  "Excés greu",
        };
    }
}

/**
 * @dataProvider speedProvider
 */
/*
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
/*
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
}*/