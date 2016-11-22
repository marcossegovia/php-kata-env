<?php

namespace Kata\BowlingKata\Domain;

final class Frame
{
    const MAX_FRAME_SCORE = 10;
    const MAX_ROLLS_BY_FRAME = 2;

    /** @var Roll[] */
    private $roll_array;

    public function addRoll(Roll $a_roll)
    {
        $this->roll_array[] = $a_roll;
    }

    public function isComplete() : bool
    {
        if (empty($this->roll_array)) {
            return false;
        }

        if (self::MAX_ROLLS_BY_FRAME == count($this->roll_array)) {
            return true;
        }

        if ($this->roll_array[0]->type()->isSpare() || $this->roll_array[0]->type()->isStrike()) {
            return true;
        }

        return false;
    }
}
