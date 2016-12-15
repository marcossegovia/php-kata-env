<?php

namespace KataTest\GildedRoseKata;

use Kata\GildedRoseKata\GildedRose;
use Kata\GildedRoseKata\Item;

class GildedRoseTest extends \PHPUnit_Framework_TestCase
{
    /** @var Item */
    private $item;

    /** @var GildedRose */
    private $gilded_rose;

    /**
     * @dataProvider agedBrieExamplesProvider
     * @test
     */
    public function agedBrieShouldIncreaseQualityAsDaysPass(
        $an_aged_brie_item,
        $days_to_pass,
        $expected_quality,
        $expected_sellin
    ) {
        $this->givenAnItem($an_aged_brie_item);
        $this->thenGildedRoseIsBuilt();
        $this->whenSomeDaysPass($days_to_pass);
        $this->itemShouldMatch($expected_quality, $expected_sellin);
    }

    /**
     * @dataProvider sulfurasExamplesProvider
     * @test
     */
    public function sulfurasShouldKeepSameQualityAndSellinAsDaysPass(
        $a_sulfuras_item,
        $days_to_pass,
        $expected_quality,
        $expected_sellin
    ) {
        $this->givenAnItem($a_sulfuras_item);
        $this->thenGildedRoseIsBuilt();
        $this->whenSomeDaysPass($days_to_pass);
        $this->itemShouldMatch($expected_quality, $expected_sellin);
    }

    /**
     * @dataProvider backstagePassExamplesProvider
     * @test
     */
    public function backstagePassShouldImproveQualityBasedOnProximityButGotoZeroWhenSellInIsZeroAsDaysPass(
        $a_backstage_item,
        $days_to_pass,
        $expected_quality,
        $expected_sellin
    ) {
        $this->givenAnItem($a_backstage_item);
        $this->thenGildedRoseIsBuilt();
        $this->whenSomeDaysPass($days_to_pass);
        $this->itemShouldMatch($expected_quality, $expected_sellin);
    }

    /**
     * @dataProvider conjuredItemExamplesProvider
     * @test
     */
    public function conjuredItemShouldDecreaseDoubleQualityAsDaysPass(
        $a_conjured_item,
        $days_to_pass,
        $expected_quality,
        $expected_sellin
    ) {
        $this->givenAnItem($a_conjured_item);
        $this->thenGildedRoseIsBuilt();
        $this->whenSomeDaysPass($days_to_pass);
        $this->itemShouldMatch($expected_quality, $expected_sellin);
    }

    /**
     * @dataProvider defaultItemExamplesProvider
     * @test
     */
    public function defaultItemShouldDecreaseQualityAsDaysPass(
        $a_default_itm,
        $days_to_pass,
        $expected_quality,
        $expected_sellin
    ) {
        $this->givenAnItem($a_default_itm);
        $this->thenGildedRoseIsBuilt();
        $this->whenSomeDaysPass($days_to_pass);
        $this->itemShouldMatch($expected_quality, $expected_sellin);
    }

    private function givenAnItem(Item $an_item)
    {
        $this->item = $an_item;
    }

    private function thenGildedRoseIsBuilt()
    {
        $this->gilded_rose = new GildedRose([$this->item]);
    }

    private function whenSomeDaysPass($days_to_pass)
    {
        for ($i = 0; $i < $days_to_pass; $i++) {
            $this->gilded_rose->update_quality();
        }
    }

    private function itemShouldMatch($expected_quality, $expected_sellin)
    {
        $this->assertEquals($expected_quality, $this->item->quality);
        $this->assertEquals($expected_sellin, $this->item->sell_in);
    }

    public function agedBrieExamplesProvider()
    {
        // Item, days to pass, expected_quality, expected_sellin;
        return [
            [new Item('Aged Brie', 2, 0), 1, 1, 1]
        ];
    }

    public function sulfurasExamplesProvider()
    {
        return [
            [new Item('Sulfuras, Hand of Ragnaros', 0, 80), 1, 80, 0],
            [new Item('Sulfuras, Hand of Ragnaros', -1, 80), 1, 80, -1]
        ];
    }

    public function backstagePassExamplesProvider()
    {
        return [
            [new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20), 1, 21, 14],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49), 1, 50, 9],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49), 1, 50, 4],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 3, 10), 1, 13, 2],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 3, 10), 10, 0, -7]
        ];
    }

    public function conjuredItemExamplesProvider()
    {
        return [
            [new Item('Conjured Mana Cake', 5, 10), 1, 8, 4],
            [new Item('Conjured Mana Cake', 5, 10), 5, 0, 0],
            [new Item('Conjured Mana Cake', 5, 4), 2, 0, 3],
            [new Item('Conjured Mana Cake', 10, 3), 5, 0, 5]
        ];
    }

    public function defaultItemExamplesProvider()
    {
        return [
            [new Item('+5 Dexterity Vest', 2, 0), 1, 0, 1],
            [new Item('+5 Dexterity Vest', 2, 0), 1, 0, 1],
            [new Item('+5 Dexterity Vest', 10, 10), 5, 5, 5]
        ];
    }
}
