<?php
namespace Kata\GildedRoseKata;

class SulfurasItem extends BaseItem
{
    const ITEM_NAME = 'Sulfuras, Hand of Ragnaros';

    public function __construct($sell_in, $quality)
    {
        parent::__construct(self::ITEM_NAME, $sell_in, $quality);
    }
}
