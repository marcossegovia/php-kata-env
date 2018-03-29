<?php

namespace Kata\Lonja\Domain;

use Kata\Lonja\Domain\Model\Product;

final class PriceRule
{
    private $city;
    private $product;
    private $price;

    public function __construct(string $a_city, Product $a_product, float $a_price)
    {
        $this->city    = $a_city;
        $this->product = $a_product;
        $this->price   = $a_price;
    }

    public function city()
    {
        return $this->city;
    }

    public function product(): Product
    {
        return $this->product;
    }

    public function price(): float
    {
        return $this->price;
    }
}