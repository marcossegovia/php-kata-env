<?php

namespace Kata\Lonja\Application\Service;

use Kata\Lonja\Domain\Model\Destination;
use Kata\Lonja\Domain\Model\Load;
use Kata\Lonja\Domain\PriceRule;
use Kata\Lonja\Domain\Service\CalculateLoadBenefit;
use Kata\Lonja\Domain\Service\Costs\LoadCostsDecorator;

final class CalculateBestDestination
{
    private $load_benefit_calculator;
    private $load_cost_calculator;

    public function __construct(CalculateLoadBenefit $a_load_benefit_calculator, LoadCostsDecorator $a_load_cost_calculator)
    {
        $this->load_benefit_calculator = $a_load_benefit_calculator;
        $this->load_cost_calculator    = $a_load_cost_calculator;
    }

    /**
     * @param Load          $a_load
     * @param Destination[] $some_destinations
     * @param PriceRule[]   $some_price_rules
     *
     * @return Destination
     */
    public function __invoke(Load $a_load, array $some_destinations, array $some_price_rules): Destination
    {
        $best_destination = $some_destinations[0];
        foreach ($some_destinations as $destination)
        {
            $destination_benefits     = $this->load_benefit_calculator->__invoke($a_load, $destination, $some_price_rules);
            $destination_costs        = $this->load_cost_calculator->__invoke($a_load, $destination, $some_price_rules, $destination_benefits);
            $destination_net_benefits = $destination_benefits + $destination_costs;

            dump($destination->city() . ': Gross benefits > ' . $destination_benefits . ', Costs > ' . $destination_costs . ', Final: ' . $destination_net_benefits);

            if (!isset($best_benefits) || $best_benefits < $destination_net_benefits)
            {
                $best_destination = $destination;
                $best_benefits    = $destination_net_benefits;
            }
        }

        return $best_destination;
    }
}