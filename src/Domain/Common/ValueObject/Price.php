<?php

declare(strict_types=1);

namespace Kata\Domain\Common\ValueObject;

class Price
{
    /** @var float  */
    private $amount;

    /** @var string  */
    private $currency;

    public function __construct(float $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    public static function instance(float $amount, string $currency): Price
    {
        return new self($amount, $currency);
    }

    public function amount(): float
    {
        return $this->amount;
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
