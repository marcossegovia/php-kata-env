<?php
/**
 * Created by PhpStorm.
 * User: albertgarcia
 * Date: 15/12/16
 * Time: 9:58
 */

namespace Kata\GildedRoseKata;

class BaseItem
{
    /** @var Item */
    public $item;

    public function __construct($name, $sell_in, $quality)
    {
        $this->item = new Item($name, $sell_in, $quality);
    }
}
