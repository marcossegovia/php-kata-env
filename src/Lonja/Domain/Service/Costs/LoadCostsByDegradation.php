<?php

namespace Kata\Lonja\Domain\Service\Costs;

use Kata\Lonja\Domain\Model\Destination;
use Kata\Lonja\Domain\Model\Load;

final class LoadCostsByDegradation extends LoadCostsDecorator
{
    protected function applyCosts(Load $a_load, Destination $a_destination, array $some_price_rules, float $net_benefits, float $previous_costs = 0): float
    {
        $percent_to_reduce = floor($a_destination->kilometers() / 100);

        return $net_benefits * ($percent_to_reduce / 100);
    }
}
