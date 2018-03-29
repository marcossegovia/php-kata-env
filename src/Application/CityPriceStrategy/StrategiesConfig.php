<?php

namespace Kata\Application\CityPriceStrategy;

use Kata\Domain\City\Model\City;
use Kata\Domain\City\ValueObject\CityId;
use Kata\Domain\Common\ValueObject\Price;
use Kata\Domain\Product\Model\Product;
use Kata\Domain\Product\ValueObject\ProductId;

class StrategiesConfig
{
    public $strategies = [];

    public static function instance()
    {
        $strategies = Strategies::instance();

        $BCN = City::instance(CityId::instance(),'BCN');
        $MAD = City::instance(CityId::instance(),'MAD');
        $LBN = City::instance(CityId::instance(),'LBN');

        $productVierira = Product::instance(ProductId::instance(), 'vieira');
        $productPulpo = Product::instance(ProductId::instance(), 'pulpo');
        $productCentollo = Product::instance(ProductId::instance(), 'centollo');

        $strategies->add($BCN, PriceStrategy::instance($productVierira, Price::instance(450, 'EUR')));
        $strategies->add($BCN, PriceStrategy::instance($productPulpo, Price::instance(120, 'EUR')));
        $strategies->add($BCN, PriceStrategy::instance($productCentollo, Price::instance(0, 'EUR')));

        $strategies->add($MAD, PriceStrategy::instance($productVierira, Price::instance(500, 'EUR')));
        $strategies->add($MAD, PriceStrategy::instance($productPulpo, Price::instance(0, 'EUR')));
        $strategies->add($MAD, PriceStrategy::instance($productCentollo, Price::instance(450, 'EUR')));

        $strategies->add($LBN, PriceStrategy::instance($productVierira, Price::instance(600, 'EUR')));
        $strategies->add($LBN, PriceStrategy::instance($productPulpo, Price::instance(100, 'EUR')));
        $strategies->add($LBN, PriceStrategy::instance($productCentollo, Price::instance(00, 'EUR')));
    }
}
