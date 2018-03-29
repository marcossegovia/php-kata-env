<?php

namespace Kata\Lonja\Domain\Service;

use Kata\Lonja\Domain\Model\Destination;
use Kata\Lonja\Domain\Model\Load;
use Kata\Lonja\Domain\PriceRule;

final class CalculateLoadBenefit
{
    /**
     * @param Load        $a_load
     * @param Destination $a_destination
     * @param PriceRule[] $some_price_rules
     *
     * @return float
     */
    public function __invoke(Load $a_load, Destination $a_destination, array $some_price_rules): float
    {
        $load_lines = $a_load->lines();
        $benefits   = 0;

        foreach ($load_lines as $load_line)
        {
            foreach ($some_price_rules as $price_rule)
            {
                if ($load_line->product()->equals($price_rule->product()) && $a_destination->city() === $price_rule->city())
                {
                    $benefits += $price_rule->price() * $load_line->kilograms();
                }
            }
        }

        return $benefits;
    }
}