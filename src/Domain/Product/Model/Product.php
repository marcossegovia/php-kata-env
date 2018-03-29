<?php

declare(strict_types=1);

namespace Kata\Domain\Product\Model;
use Kata\Domain\Common\ValueObject\AggregateRoot;
use Kata\Domain\Product\ValueObject\ProductId;

class Product extends AggregateRoot
{
    /** @var string  */
    private $name;

    public function __construct(ProductId $productId, string $name)
    {
        parent::__construct($productId);
        $this->name = $name;
    }

    public static function instance(ProductId $productId, string $name): Product
    {
        return new self($productId, $name);
    }

    public function name(): string
    {
        return $this->name;
    }
}
