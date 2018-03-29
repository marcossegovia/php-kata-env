<?php

namespace Kata;

final class Calculator
{
    /** @var City[] */
    private $cities;

    /** @var Product[] */
    private $products;

    public function __construct(array $some_cities, array $some_products)
    {
        $this->cities   = $some_cities;
        $this->products = $some_products;
    }

    public function findBestCity(): City
    {
        $results = [];

        foreach ($this->cities as $current_city)
        {
            $product_totals = [];

            foreach ($this->products as $current_product)
            {
                $shipping_rule = $current_city->productShippingRule($current_product);

                $total = $current_product->weight() * $shipping_rule->price();
                $total -= $current_city->saleCostEveryThousandKmPercentage() * $total;
                $product_totals[] = $total;
            }

            $total = array_sum($product_totals);
            $total -= $current_city->loadCost();

            $results[$current_city->name()] = $total;
        }

        asort($results);

        end($results);

        $city_name = key($results);

        return $this->cityByName($city_name);
    }

    private function cityByName(string $name): City
    {
        foreach ($this->cities as $current_city)
        {
            if ($current_city->name() === $name)
            {
                return $current_city;
            }
        }

        return null;
    }
}
