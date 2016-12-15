<?php
namespace Kata\GildedRoseKata;

final class ConjuredItem extends BaseItem
{
    const ITEM_NAME = 'Conjured Mana Cake';

    protected function getQualityMagnitudeForNextUpdate()
    {
        return 2;
    }
}
