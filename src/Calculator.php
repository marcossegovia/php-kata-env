<?php

namespace Kata;

class Calculator
{
    private $cities = [];
    private $loaded_seafoods = [];
    private $seafood_prices = [];
    private $fixed_costs = [];
    private $km_costs = [];

    public function __construct(array $cities, array $loaded_seafoods, array $seafood_prices, array $fixed_costs, array $km_costs)
    {
        $this->cities          = $cities;
        $this->loaded_seafoods = $loaded_seafoods;
        $this->seafood_prices  = $seafood_prices;
        $this->fixed_costs     = $fixed_costs;
        $this->km_costs        = $km_costs;
    }

    public function calculateBest()
    {
        /** @var City $city */
        foreach ($this->cities as $city)
        {
            $city_id            = $city->getCityId();
            $van_costs          = $this->calculateVanLoadingCostsForCity($city)
            $earnings[$city_id] = $this->calculateEarningsForSellingSeaFoodsToThisCity($city);
            $earnings[$city_id] -= ($van_costs, )

        }
    }

    private function calculateVanLoadingCostsForCity(City $city): float
    {
        $km_to_city = $this->getCity($city)->distance();

        return $this->fixed_costs[0]->getCost() + ($this->km_costs[0]->getCost() * $km_to_city);
    }

    private function calculateDevaluationCostForCity(City $city, float $earnings): float
    {
        return $earnings * $this->getCity($city)->getDevaluationCost();
    }


    private function getCity(int $city_id): City
    {
        foreach ($this->cities as $city)
        {
            if ($city->ciyId() === $city_id)
            {
                return $city;
            }
        }
    }

    private function getSeaFoodCityPrice(City $city, SeaFood $seafood)
    {
        foreach($this->seafood_prices as $seafood_price)
        {
            
        }
    }

    private function calculateEarningsForSellingSeaFoodsToThisCity(City $city)
    {
        $earnings = 0;

        /** @var SeaFood $seafood */
        foreach ($this->loaded_seafoods as $seafood)
        {
            $selling_price_for_this_seafood_and_city = $this->getSellingPriceForThisSeaFoodAndCity($city, $seafood);
            $kg_loaded_to_van                        = $seafood->getKgBought();

            $earnings += $selling_price_for_this_seafood_and_city * $kg_loaded_to_van;
            $earnings -= $this->calculateDevaluationCostForCity($city, $earnings);
        }

        return $earnings;
    }

    private function getSellingPriceForThisSeaFoodAndCity(City $city, SeaFood $seafood): float
    {
        $seafood_city_price = $this->getSeaFoodCityPrice($city, $seafood);
    }
}
