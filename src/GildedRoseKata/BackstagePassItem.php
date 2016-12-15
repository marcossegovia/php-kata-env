<?php
namespace Kata\GildedRoseKata;

class BackstagePassItem extends BaseItem
{
    const ITEM_NAME = 'Backstage passes to a TAFKAL80ETC concert';

    protected $degrade_with_time = false;

    public function __construct(Item $an_item)
    {
        parent::__construct($an_item);
    }

    protected function getQualityMagnitudeForNextUpdate()
    {
        if ($this->item->sell_in <= 0) {
            return $this->item->quality;
        }
        if ($this->item->sell_in <= 5) {
            return 3;
        }
        if ($this->item->sell_in <= 10) {
            return 2;
        }

        return 1;
    }
}
