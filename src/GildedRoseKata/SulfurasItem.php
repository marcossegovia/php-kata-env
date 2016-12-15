<?php
namespace Kata\GildedRoseKata;

class SulfurasItem extends BaseItem
{
    const ITEM_NAME = 'Sulfuras, Hand of Ragnaros';

    public function __construct(Item $an_item)
    {
        parent::__construct($an_item);
    }

    public function updateQualityByDayPassed()
    {
        return;
    }
}
