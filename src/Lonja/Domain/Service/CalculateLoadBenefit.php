<?php

namespace Kata\Lonja\Domain\Service;

use Kata\Lonja\Domain\Model\Destination;
use Kata\Lonja\Domain\Model\Load;
use Kata\Lonja\Domain\Model\LoadLine;
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
            $this->recalculateLoadLineBenefits($a_destination, $some_price_rules, $load_line, $benefits);
        }

        return $benefits;
    }

    /**
     * @param Destination $a_destination
     * @param PriceRule[] $some_price_rules
     * @param LoadLine    $load_line
     * @param float       $benefits
     *
     * @return void
     */
    private function recalculateLoadLineBenefits(Destination $a_destination, array $some_price_rules, LoadLine $load_line, float &$benefits): void
    {
        foreach ($some_price_rules as $price_rule)
        {
            $this->recalculateLoadLineBenefitsIfMatchPriceRules($a_destination, $load_line, $price_rule, $benefits);
        }
    }

    private function recalculateLoadLineBenefitsIfMatchPriceRules(Destination $a_destination, LoadLine $load_line, PriceRule $price_rule, float &$benefits): void
    {
        if ($this->currentProductAndDestinationMatchPriceRule($a_destination, $load_line, $price_rule))
        {
            $benefits += $price_rule->price() * $load_line->kilograms();
        }
    }

    private function currentProductMatchPriceRule(LoadLine $load_line, PriceRule $price_rule): bool
    {
        return $load_line->product()->equals($price_rule->product());
    }

    private function currentDestinationMatchPriceRule(Destination $a_destination, PriceRule $price_rule): bool
    {
        return $a_destination->city() === $price_rule->city();
    }

    private function currentProductAndDestinationMatchPriceRule(Destination $a_destination, LoadLine $load_line, PriceRule $price_rule): bool
    {
        return $this->currentProductMatchPriceRule($load_line, $price_rule) && $this->currentDestinationMatchPriceRule($a_destination, $price_rule);
    }
}