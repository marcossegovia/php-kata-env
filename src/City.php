<?php

namespace Kata;

class City
{
    private $city_id;
    private $name;
    private $distance;
    private $devaluation_cost;

    public function __construct(int $city_id, string $name, int $distance)
    {
        $this->city_id          = $city_id;
        $this->name             = $name;
        $this->distance         = $distance;
        $this->devaluation_cost = $this->calculateDevaluationCostForCity($distance);
    }

    private function calculateDevaluationCostForCity(int $distance): float
    {
        return 0.01 * $distance;
    }

    /**
     * @return int
     */
    public function getCityId(): int
    {
        return $this->city_id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getDistance(): int
    {
        return $this->distance;
    }

    /**
     * @return float
     */
    public function getDevaluationCost(): float
    {
        return $this->devaluation_cost;
    }


}
