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
                return new AgedBrieItem($item->sell_in, $item->quality);
                break;
            case SulfurasItem::ITEM_NAME:
                return new SulfurasItem($item->sell_in, $item->quality);
                break;
            case BackstagePassItem::ITEM_NAME:
                return new BackstagePassItem($item->sell_in, $item->quality);
                break;
            default:
                return new BaseItem($item->name, $item->sell_in, $item->quality);
        }
    }
}
