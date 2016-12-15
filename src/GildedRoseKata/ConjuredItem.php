<?php
namespace Kata\GildedRoseKata;

class ConjuredItem extends BaseItem
{
    const ITEM_NAME = 'Conjured Mana Cake';

    protected function getQualityMagnitudeForNextUpdate()
    {
        return 2;
    }
}
