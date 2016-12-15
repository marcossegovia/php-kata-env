<?php
/**
 * Created by PhpStorm.
 * User: albertgarcia
 * Date: 15/12/16
 * Time: 10:04
 */

namespace Kata\GildedRoseKata;

class ItemFactory
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
