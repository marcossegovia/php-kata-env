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
            if ('Sulfuras, Hand of Ragnaros' == $item->name) {
                continue;
            }
            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                $item->quality = $item->quality - 1;
            } else {
                $item->quality = $item->quality + 1;
                if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    if ($item->sell_in < 11) {
                        $item->quality = $item->quality + 1;
                    }
                    if ($item->sell_in < 6) {
                        $item->quality = $item->quality + 1;
                    }
                }
            }

            $item->sell_in = $item->sell_in - 1;

            if ($item->sell_in < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        $item->quality = $item->quality - 1;
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    $item->quality = $item->quality + 1;
                }
            }

            $this->validateQualityInsideBoundaries($item);
        }
    }

    private function validateQualityInsideBoundaries(Item $item)
    {
        if ($item->quality > 50) {
            $item->quality = 50;
        }

        if ($item->quality < 0) {
            $item->quality = 0;
        }
    }
}


