<?php

namespace Kata\GildedRoseKata;

class GildedRose
{
    /** @var Item[] */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function update_quality()
    {
        foreach ($this->items as $item) {
            $internal_item = ItemFactory::fromItem($item);
            $internal_item->updateQualityByDayPassed();
        }
    }
}


