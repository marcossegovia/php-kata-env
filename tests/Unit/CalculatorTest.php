<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    /** @test */
    public function shouldReturnTheBestCity()
    {
        $vieira = new Product('vieira', 50);
        $pulpo = new Product('pulpo', 100);
        $centollos = new Product('centollos', 50);

        $cities = [
            new City('BCN', [new ShippingRule($vieira, 450), new ShippingRule($pulpo, 120), new ShippingRule($centollos, 0)], 1100),
            new City('MAD', [new ShippingRule($vieira, 500), new ShippingRule($pulpo, 0), new ShippingRule($centollos, 100)], 800),
            new City('LBN', [new ShippingRule($vieira, 600), new ShippingRule($pulpo, 100), new ShippingRule($centollos, 500)], 600)
        ];

        $calculator = new Calculator($cities, [$vieira, $pulpo, $centollos]);

        $actual = $calculator->findBestCity();

        $this->assertInstanceOf($expected = City::class, $actual);
        $this->assertEquals($expected = 'LBN', $actual->name());
    }
}
