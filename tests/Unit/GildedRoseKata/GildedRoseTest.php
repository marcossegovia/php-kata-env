<?php

namespace KataTest\GildedRoseKata;

use Kata\GildedRoseKata\GildedRose;
use Kata\GildedRoseKata\Item;

class GildedRoseTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function foo()
    {
        $items      = array(new Item("foo", 0, 0));
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals("foo", $items[0]->name);
    }

    /** @test */
    public function NormalItemDecrementsQualityWhenADayHasPassed()
    {
        $items      = array(
            new Item('+5 Dexterity Vest', 10, 20)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(19, $items[0]->quality);
    }

    /** @test */
    public function NormalItemDecrementsSellInWhenADayHasPassed()
    {
        $items      = array(
            new Item('+5 Dexterity Vest', 10, 20)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(9, $items[0]->sell_in);
    }

    /** @test */
    public function AgedBrieIncrementsQualityWhenADayHasPassed()
    {
        $items      = array(
            new Item('Aged Brie', 2, 0)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(1, $items[0]->quality);
    }

    /** @test */
    public function AgedBrieDecrementsSellInWhenADayHasPassed()
    {
        $items      = array(
            new Item('Aged Brie', 2, 0),
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(1, $items[0]->sell_in);
    }

    /** @test */
    public function SulfurasIncrementsNeverIncrementsOrDecrementsQualityWhenADayHasPassed()
    {
        $items      = array(
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(80, $items[0]->quality);
    }

    /** @test */
    public function SulfurasNeverIncrementsOrDecrementsSellInWhenADayHasPassed()
    {
        $items      = array(
            new Item('Sulfuras, Hand of Ragnaros', 0, 80),
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(0, $items[0]->sell_in);
    }

    /** @test */
    public function BackstagePassesIncrementsQualityWhenADayHasPassedAndSellInBiggerThanTen()
    {
        $items      = array(
            new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(21, $items[0]->quality);
    }

    /** @test */
    public function BackstagePassesIncrementsQualityWhenADayHasPassedAndSellInSmallerOrEqualThanTen()
    {
        $items      = array(
            new Item('Backstage passes to a TAFKAL80ETC concert', 10, 9)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(11, $items[0]->quality);
    }

    /** @test */
    public function BackstagePassesIncrementsQualityWhenADayHasPassedAndSellInSmallerOrEqualThanFive()
    {
        $items      = array(
            new Item('Backstage passes to a TAFKAL80ETC concert', 5, 9)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(12, $items[0]->quality);
    }

    /** @test */
    public function BackstagePassesIncrementsQualityWhenADayHasPassedAndSellInSmallerOrEqualThanZero()
    {
        $items      = array(
            new Item('Backstage passes to a TAFKAL80ETC concert', 0, 9)
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(0, $items[0]->quality);
    }

    /** @test */
    public function ItemNeverIncreasesQualityMoreThanFiftyWhenADayHasPassed()
    {
        $items      = array(
            new Item('Aged Brie', 2, 50),
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(50, $items[0]->quality);
    }

    /** @test */
    public function ItemQualityNeverCanBeSmallerThanZeroWhenADayHasPassed()
    {
        $items      = array(
            new Item('+5 Dexterity Vest', 2, 0),
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(0, $items[0]->quality);
    }

    /** @test */
    public function ItemSellInExpiredQualityDecreasesDoubleWhenADayHasPassed()
    {
        $items      = array(
            new Item('+5 Dexterity Vest', 0, 2),
        );
        $gildedRose = new GildedRose($items);
        $gildedRose->update_quality();
        $this->assertEquals(0, $items[0]->quality);
    }
}
