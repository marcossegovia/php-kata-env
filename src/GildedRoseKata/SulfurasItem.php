<?php

namespace Kata\GildedRoseKata;

final class SulfurasItem extends Item
{
    public $name;
    public $sell_in;
    public $quality;

    const NAME = "Sulfuras, Hand of Ragnaros";

    public static function createSulfurasItem($sell_in, $quality)
    {
        return new self(self::NAME, $sell_in, $quality);
    }
}