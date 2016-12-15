<?php

namespace Kata\GildedRoseKata;

class GildedRose
{

    private $items;

    function __construct($items)
    {
        $this->items = $items;
    }

    function update_quality()
    {
        foreach ($this->items as $item) {
            $internal_item = ItemFactory::fromItem($item);
            $internal_item->updateQualityByDayPassed();
        }
    }
}


