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
    const DEGRADE_WITH_TIME = true;

    /** @var Item */
    protected $item;

    public function __construct(Item $an_item)
    {
        $this->item = $an_item;
    }

    protected function getQualityMagnitudeForNextUpdate()
    {
        return 1;
    }

    public function updateQualityByDayPassed()
    {
        $this->item->sell_in--;
        if (true === static::DEGRADE_WITH_TIME) {
            $this->item->quality = $this->item->quality - $this->getQualityMagnitudeForNextUpdate();
        }

        if (false === static::DEGRADE_WITH_TIME) {
            $this->item->quality = $this->item->quality + $this->getQualityMagnitudeForNextUpdate();
        }
        $this->validateQualityBoundaries();
    }

    private function validateQualityBoundaries()
    {
        if ($this->item->quality < 0) {
            $this->item->quality = 0;
        }

        if ($this->item->quality > 50) {
            $this->item->quality = 50;
        }
    }
}
