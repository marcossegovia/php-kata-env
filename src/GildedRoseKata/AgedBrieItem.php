<?php

namespace Kata\GildedRoseKata;

class AgedBrieItem extends Item
{
    public $name;
    public $sell_in;
    public $quality;

    const NAME = "Aged Brie";

    public static function createAgedBrieItem($sell_in, $quality)
    {
        return new self(self::NAME, $sell_in, $quality);
    }


}
