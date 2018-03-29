<?php

namespace Kata\Lonja\Domain\Service\Costs;

use Kata\Lonja\Domain\Model\Destination;
use Kata\Lonja\Domain\Model\Load;

final class LoadCostsByDistance extends LoadCostsDecorator
{
    protected function applyCosts(Load $a_load, Destination $a_destination, array $some_price_rules, float $net_benefits, float $previous_costs = 0): float
    {
        $truck_load_costs = 5;

        return $truck_load_costs + ($a_destination->kilometers() * 2);
    }
}