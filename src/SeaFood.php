<?php

namespace Kata;

final class SeaFood
{
    private $seafood_id;
    private $name;
    private $kg_bought;

    public function __construct(int $seafood_id, string $name, float $kg_bought)
    {
        $this->seafood_id = $seafood_id;
        $this->name       = $name;
        $this->kg_bought  = $kg_bought;
    }

    public function getSeafoodId(): int
    {
        return $this->seafood_id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getKgBought(): float
    {
        return $this->kg_bought;
    }
}
