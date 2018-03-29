<?php

namespace Kata;

final class City
{
    private const FIXED_LOAD_COST_IN_EUR = 5;
    private const LOAD_COST_IN_EUR_PER_KM = 2;

    private $name;

    /** @var ShippingRule[] */
    private $shipping_rules;
    private $distance;

    public function __construct(string $a_name, array $some_shipping_rules, int $a_distance)
    {
        $this->name           = $a_name;
        $this->shipping_rules = $some_shipping_rules;
        $this->distance       = $a_distance;
    }

    public function name()
    {
        return $this->name;
    }

    public function productShippingRule(Product $a_product): ?ShippingRule
    {
        foreach ($this->shipping_rules as $current_shipping_rule)
        {
            if ($current_shipping_rule->product()->equalTo($a_product))
            {
                return $current_shipping_rule;
            }
        }

        return null;
    }

    public function loadCost(): int
    {
        return self::FIXED_LOAD_COST_IN_EUR + self::LOAD_COST_IN_EUR_PER_KM * $this->distance;
    }

    public function saleCostEveryThousandKmPercentage(): float
    {
        $percentage = $this->distance / 100 / 100;
        return $percentage;
    }
}
