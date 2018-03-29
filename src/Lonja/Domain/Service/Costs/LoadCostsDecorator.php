<?php

namespace Kata\Lonja\Domain\Service\Costs;

use Kata\Lonja\Domain\Model\Destination;
use Kata\Lonja\Domain\Model\Load;

abstract class LoadCostsDecorator
{
    private $next_load_cost;

    public function __construct(self $next_load_cost = null)
    {
        $this->next_load_cost = $next_load_cost;
    }

    public function __invoke(Load $a_load, Destination $a_destination, array $some_price_rules, float $net_benefits, float $previous_costs = 0)
    {
        $costs = $previous_costs + $this->applyCosts($a_load, $a_destination, $some_price_rules, $net_benefits, $previous_costs);

        return $this->next($a_load, $a_destination, $some_price_rules, $net_benefits, $costs);
    }

    abstract protected function applyCosts(Load $a_load, Destination $a_destination, array $some_price_rules, float $net_benefits, float $previous_costs = 0): float;

    private function next($a_load, $a_destination, $some_price_rules, $net_benefits, $costs)
    {
        if (null === $this->next_load_cost)
        {
            return -$costs;
        }

        return $this->next_load_cost->__invoke($a_load, $a_destination, $some_price_rules, $net_benefits, $costs);
    }
}