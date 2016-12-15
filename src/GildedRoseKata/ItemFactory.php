<?php

namespace Kata\GildedRoseKata;

final class ItemFactory
{
    public static function fromItem(Item $item)
    {
        switch($item->name)
        {
            case AgedBrieItem::ITEM_NAME:
                return new AgedBrieItem($item);
                break;
            case SulfurasItem::ITEM_NAME:
                return new SulfurasItem($item);
                break;
            case BackstagePassItem::ITEM_NAME:
                return new BackstagePassItem($item);
                break;
            case ConjuredItem::ITEM_NAME:
                return new ConjuredItem($item);
                break;
            default:
                return new BaseItem($item);
        }
    }
}
