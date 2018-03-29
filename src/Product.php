<?php

namespace Kata;

final class Product
{
    private $name;
    private $weight;

    public function __construct(string $a_name, int $a_weight)
    {
        $this->name = $a_name;
        $this->weight = $a_weight;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function weight(): int
    {
        return $this->weight;
    }

    public function equalTo(Product $a_product): bool
    {
        return $this->name === $a_product->name() && $this->weight === $a_product->weight();
    }
}
