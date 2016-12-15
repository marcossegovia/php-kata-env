<?php

namespace Kata\GildedRoseKata;

class BackstagePassesItem extends Item
{
    public $name;
    public $sell_in;
    public $quality;

    const NAME = "Backstage passes to a TAFKAL80ETC concert";

    public static function createBackstagePasses($sell_in, $quality)
    {
        return new self(self::NAME, $sell_in, $quality);
    }


}
