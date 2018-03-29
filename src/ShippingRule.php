<?php

namespace Kata;

final class ShippingRule
{
    private $product;
    private $price;

    public function __construct(Product $a_product, int $a_price)
    {
        $this->product  = $a_product;
        $this->price    = $a_price;
    }

    public function product(): Product
    {
        return $this->product;
    }
    
    public function price(): int
    {
        return $this->price;
    }
}
