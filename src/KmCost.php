<?php

namespace Kata;

class KmCost
{
    private $cost_id;
    private $cost;

    public function __construct(int $cost_id, float $cost)
    {
        $this->cost_id = $cost_id;
        $this->cost    = $cost;
    }

    /**
     * @return int
     */
    public function getCostId(): int
    {
        return $this->cost_id;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }


}
