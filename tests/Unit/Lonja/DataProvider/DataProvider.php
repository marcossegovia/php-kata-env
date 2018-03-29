<?php

namespace Kata\Lonja\DataProvider;

use Kata\Lonja\Domain\Model\Destination;
use Kata\Lonja\Domain\Model\Load;
use Kata\Lonja\Domain\Model\LoadLine;
use Kata\Lonja\Domain\Model\Product;
use Kata\Lonja\Domain\PriceRule;

final class DataProvider
{
    public static function load(): Load
    {
        return new Load(
            [
                new LoadLine(new Product('Vieiras'), 50),
                new LoadLine(new Product('Pulpo'), 100),
                new LoadLine(new Product('Centollos'), 50)
            ]
        );
    }

    public static function destinationBarcelona(): Destination
    {
        return new Destination('Barcelona', 1100);
    }

    public static function destinationMadrid(): Destination
    {
        return new Destination('Madrid', 800);
    }

    public static function destinationLisboa(): Destination
    {
        return new Destination('Lisboa', 600);
    }

    public static function benefitsBarcelona(): float
    {
        return 34500;
    }

    public static function benefitsMadrid(): float
    {
        return 47500;
    }

    public static function benefitsLisboa(): float
    {
        return 65000;
    }

    public static function bestDestination(): Destination
    {
        return new Destination('Lisboa', 600);
    }

    /** @return PriceRule[] */
    public static function priceRules(): array
    {
        return [
            new PriceRule('Barcelona', new Product('Vieiras'), 450),
            new PriceRule('Barcelona', new Product('Pulpo'), 120),
            new PriceRule('Barcelona', new Product('Centollos'), 0),
            new PriceRule('Madrid', new Product('Vieiras'), 500),
            new PriceRule('Madrid', new Product('Pulpo'), 0),
            new PriceRule('Madrid', new Product('Centollos'), 450),
            new PriceRule('Lisboa', new Product('Vieiras'), 600),
            new PriceRule('Lisboa', new Product('Pulpo'), 100),
            new PriceRule('Lisboa', new Product('Centollos'), 500)
        ];
    }
}