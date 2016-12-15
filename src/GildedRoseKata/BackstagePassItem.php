<?php
namespace Kata\GildedRoseKata;

final class BackstagePassItem extends BaseItem
{
    const ITEM_NAME = 'Backstage passes to a TAFKAL80ETC concert';
    const DEGRADE_WITH_TIME = false;

    const DAYS_TO_BE_VERY_CLOSE = 5;
    const DAYS_TO_BE_CLOSE = 10;

    protected function getQualityMagnitudeForNextUpdate()
    {
        if ($this->concertHasStartedOrHasBeenCelebrated()) {
            return -$this->item->quality;
        }
        if ($this->concertDateIsVeryClose()) {
            return 3;
        }
        if ($this->concertDateIsClose()) {
            return 2;
        }

        return 1;
    }

    private function concertHasStartedOrHasBeenCelebrated()
    {
        return $this->item->sell_in <= 0;
    }

    private function concertDateIsVeryClose()
    {
        return $this->item->sell_in <= self::DAYS_TO_BE_VERY_CLOSE;
    }

    private function concertDateIsClose()
    {
        return $this->item->sell_in <= self::DAYS_TO_BE_CLOSE;
    }
}
