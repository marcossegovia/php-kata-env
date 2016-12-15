<?php

namespace Kata\GildedRoseKata;

class BackstagePassesItem
{
    public $name;
    public $item;

    const NAME = "Backstage passes to a TAFKAL80ETC concert";

    public static function createBackstagePasses($item)
    {
        return new self(self::NAME, $item);
    }
}
