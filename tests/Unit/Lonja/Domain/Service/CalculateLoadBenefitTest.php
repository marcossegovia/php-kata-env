<?php

namespace Kata\Lonja\Domain\Service;

use Kata\Lonja\DataProvider\DataProvider;
use Kata\Lonja\Domain\Model\Destination;
use Kata\Lonja\Domain\Model\Load;
use PHPUnit\Framework\TestCase;

class CalculateLoadBenefitTest extends TestCase
{
    /**
     * @test
     * @dataProvider provideTestData
     */
    public function shouldWork(Load $load, Destination $destination, array $price_rules, float $expected_benefit)
    {
        $service = new CalculateLoadBenefit();
        $benefit = $service->__invoke($load, $destination, $price_rules);

        $this->assertEquals($expected_benefit, $benefit);
    }

    public function provideTestData()
    {
        return [
            [
                DataProvider::load(),
                DataProvider::destinationBarcelona(),
                DataProvider::priceRules(),
                DataProvider::benefitsBarcelona()
            ],
            [
                DataProvider::load(),
                DataProvider::destinationMadrid(),
                DataProvider::priceRules(),
                DataProvider::benefitsMadrid()
            ],
            [
                DataProvider::load(),
                DataProvider::destinationLisboa(),
                DataProvider::priceRules(),
                DataProvider::benefitsLisboa()
            ],
        ];
    }
}
