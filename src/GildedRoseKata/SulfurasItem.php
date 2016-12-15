<?php

namespace Kata\GildedRoseKata;

final class SulfurasItem
{
    public $name;
    public $item;

    const NAME = "Sulfuras, Hand of Ragnaros";

    public static function createSulfurasItem($item)
    {
        return new self(self::NAME, $item);
    }
}