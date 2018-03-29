<?php

namespace Kata;

class TestKata extends \PHPUnit_Framework_TestCase
{
    private $cities = [];
    private $loaded_seafoods = [];
    private $seafood_prices = [];
    private $fixed_costs = [];
    private $km_costs = [];

    public function givenAVanLoadedWithSeaFoods()
    {
        $this->loaded_seafoods = [
            new SeaFood(1, 'Vieiras', 50),
            new SeaFood(2, 'Pulpo', 100),
            new SeaFood(3, 'Centollos', 50)
        ];
    }

    public function givenSomeCities()
    {
        $this->cities = [
            new City(1, 'Barcelona', 1100),
            new City(2, 'Madrid', 800),
            new City(3, 'Lisboa', 600)
        ];
    }

    public function givenSomeSeaFoodPrices()
    {
        $this->seafood_prices = [
            new SeaFoodCityPrice(1, 1, 450),
            new SeaFoodCityPrice(1, 2, 120),
            new SeaFoodCityPrice(1, 3, 0),

            new SeaFoodCityPrice(2, 1, 500),
            new SeaFoodCityPrice(2, 2, 0),
            new SeaFoodCityPrice(2, 3, 450),

            new SeaFoodCityPrice(3, 1, 600),
            new SeaFoodCityPrice(3, 2, 100),
            new SeaFoodCityPrice(3, 3, 500),

        ];
    }

    public function givenSomeFixedCosts()
    {
        $this->fixed_costs = [
            new FixedCost(1, 'Van Loading cost', 5)
        ];
    }

    public function givenSomeKmCosts()
    {
        $this->km_costs = [
            new KmCost(1, 2.00);];
    }
}
