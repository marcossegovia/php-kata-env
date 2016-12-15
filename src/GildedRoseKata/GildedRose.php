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
            if (SulfurasItem::ITEM_NAME == $item->name) {
                continue;
            }

            $this->decreaseItemSellIn($item);
            $this->calculateItemQuality($item);
        }
    }

    private function decreaseItemSellIn(Item $item)
    {
        $item->sell_in = $item->sell_in - 1;
    }

    private function calculateItemQuality(Item $item)
    {
        if ($item->name != AgedBrieItem::ITEM_NAME and $item->name != BackstagePassItem::ITEM_NAME) {
            $item->quality = $item->quality - 1;
        } else {
            $item->quality = $item->quality + 1;
            if ($item->name == BackstagePassItem::ITEM_NAME) {
                if ($item->sell_in < 11) {
                    $item->quality = $item->quality + 1;
                }
                if ($item->sell_in < 6) {
                    $item->quality = $item->quality + 1;
                }
            }
        }

        if ($item->sell_in < 0) {
            if ($item->name != AgedBrieItem::ITEM_NAME) {
                if ($item->name != BackstagePassItem::ITEM_NAME) {
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


