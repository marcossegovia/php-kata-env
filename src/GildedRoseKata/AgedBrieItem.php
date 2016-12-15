<?php
namespace Kata\GildedRoseKata;

class AgedBrieItem extends BaseItem
{
    const ITEM_NAME = 'Aged Brie';

    public function __construct($sell_in, $quality)
    {
        parent::__construct(self::ITEM_NAME, $sell_in, $quality);
    }
}
