<?php

namespace Kata;

class FixedCost
{
    private $cost_id;
    private $name;
    private $cost;

    public function __construct(int $cost_id, string $name, float $cost)
    {
        $this->cost_id = $cost_id;
        $this->name    = $name;
        $this->cost    = $cost;
    }

    /**
     * @return mixed
     */
    public function getCostId(): int
    {
        return $this->cost_id;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getCost(): float
    {
        return $this->cost;
    }


}
