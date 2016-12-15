<?php
namespace Kata\GildedRoseKata;

class AgedBrieItem extends BaseItem
{
    const ITEM_NAME = 'Aged Brie';

    protected $degrade_with_time = false;

    public function __construct(Item $an_item)
    {
        parent::__construct($an_item);
    }
}
