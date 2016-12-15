<?php

namespace Kata\GildedRoseKata;

final class ItemFactory
{
    public static function fromItem(Item $item)
    {
        switch ($item->name) {
            case AgedBrieItem::ITEM_NAME:
                return new AgedBrieItem($item);
            case SulfurasItem::ITEM_NAME:
                return new SulfurasItem($item);
            case BackstagePassItem::ITEM_NAME:
                return new BackstagePassItem($item);
            case ConjuredItem::ITEM_NAME:
                return new ConjuredItem($item);
            default:
                return new BaseItem($item);
        }
    }
}
