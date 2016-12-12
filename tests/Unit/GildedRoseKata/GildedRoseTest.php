<?php

namespace KataTest\GildedRoseKata;

use Kata\GildedRoseKata\GildedRose;
use Kata\GildedRoseKata\Item;

class GildedRoseTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function foo() {
        $items = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals("fixme", $items[0]->name);
    }
}
