<?php

namespace Kata;

class SeaFoodCityPrice
{
    private $city_id;
    private $seafood_id;
    private $price_per_kg;

    public function __construct(int $city_id, int $seafood_id, float $price_per_kg)
    {
        $this->city_id      = $city_id;
        $this->seafood_id   = $seafood_id;
        $this->price_per_kg = $price_per_kg;
    }

    /**
     * @return mixed
     */
    public function getCityId(): id
    {
        return $this->city_id;
    }

    /**
     * @return mixed
     */
    public function getSeafoodId(): id
    {
        return $this->seafood_id;
    }

    /**
     * @return mixed
     */
    public function getPricePerKg(): float
    {
        return $this->price_per_kg;
    }


}
