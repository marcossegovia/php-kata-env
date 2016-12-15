<?php

namespace Kata\GildedRoseKata;

class AgedBrieItem
{
    public $name;
    public $item;

    const NAME = "Aged Brie";

    public static function createAgedBrieItem($item)
    {
        return new self(self::NAME, $item);
    }


}
