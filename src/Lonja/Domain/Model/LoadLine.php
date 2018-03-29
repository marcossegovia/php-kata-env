<?php

namespace Kata\Lonja\Domain\Model;

final class LoadLine
{
    /** @var Product */
    private $product;
    private $kilograms;

    public function __construct(Product $a_product, int $a_kilograms)
    {
        $this->product   = $a_product;
        $this->kilograms = $a_kilograms;
    }

    public function product(): Product
    {
        return $this->product;
    }

    public function kilograms(): int
    {
        return $this->kilograms;
    }
}