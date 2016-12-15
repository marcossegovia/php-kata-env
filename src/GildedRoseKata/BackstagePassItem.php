<?php
namespace Kata\GildedRoseKata;

class BackstagePassItem extends BaseItem
{
    const ITEM_NAME = 'Backstage passes to a TAFKAL80ETC concert';

    public function __construct($sell_in, $quality)
    {
        parent::__construct(self::ITEM_NAME, $sell_in, $quality);
    }
}
