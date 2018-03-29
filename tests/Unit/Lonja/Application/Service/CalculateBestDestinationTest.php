<?php

namespace Kata\Lonja\Application\Service;

use Kata\Lonja\DataProvider\DataProvider;
use Kata\Lonja\Domain\Service\CalculateLoadBenefit;
use Kata\Lonja\Domain\Service\Costs\LoadCostsByDegradation;
use Kata\Lonja\Domain\Service\Costs\LoadCostsByDistance;
use PHPUnit\Framework\TestCase;

class CalculateBestDestinationTest extends TestCase
{
    /** @test */
    public function shouldWork()
    {
        $load = DataProvider::load();
        $destinations = [
            DataProvider::destinationBarcelona(),
            DataProvider::destinationMadrid(),
            DataProvider::destinationLisboa()
        ];
        $price_rules = DataProvider::priceRules();

        $service = new CalculateBestDestination(
            new CalculateLoadBenefit(),
            new LoadCostsByDistance(
                new LoadCostsByDegradation()
            )
        );

        $best_destination = $service->__invoke($load, $destinations, $price_rules);

        $this->assertEquals(DataProvider::bestDestination(), $best_destination);
    }
}
