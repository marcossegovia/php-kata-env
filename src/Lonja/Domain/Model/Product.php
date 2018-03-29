<?php

namespace Kata\Lonja\Domain\Model;

final class Product
{
    private $name;

    public function __construct(string $a_name)
    {
        $this->name = $a_name;
    }

    public function equals(Product $a_product): bool
    {
        return $this->name === $a_product->name;
    }
}
