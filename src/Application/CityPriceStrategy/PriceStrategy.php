<?php

declare(strict_types=1);

namespace Kata\Application\CityPriceStrategy;

use Kata\Domain\Common\ValueObject\Price;
use Kata\Domain\Product\Model\Product;

class PriceStrategy implements Strategy
{
    /** @var Product  */
    private $product;

    /** @var Price  */
    private $price;

    public function __construct(Product $product, Price $price)
    {
        $this->product = $product;
        $this->price = $price;
    }

    public static function instance(Product $product, Price $price): PriceStrategy
    {
        return new self($product, $price);
    }

    public function price(): float
    {
        return $this->price->amount();
    }
}
