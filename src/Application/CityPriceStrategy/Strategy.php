<?php

declare(strict_types=1);

namespace Kata\Application\CityPriceStrategy;

interface Strategy
{
    public function price(): float;
}
