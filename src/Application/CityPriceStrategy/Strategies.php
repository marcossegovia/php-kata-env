<?php

namespace Kata\Application\CityPriceStrategy;

use Kata\Domain\City\Model\City;

class Strategies
{
    public $strategies = [];

    public static function instance(): Strategies
    {
        return new self();
    }

    public function add(City $city, Strategy $strategy)
    {
        $this->strategies[$city->name()][] = $strategy;
    }

    public function calculate(City $item, $qty)
    {
        //TODO
    }
}
