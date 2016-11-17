<?php

namespace Kata\BowlingKata;

final class BowlingGame
{
    const FRAME_SCORE = 10;
    const MAX_FRAMES = 10;

    private $total_game_score = 0;
    private $frames = [];
    private $current_frame = 0;
    private $rolls = [];
    private $current_roll = 0;

    public function __invoke(array $rolls) : int
    {
        $this->rolls = $rolls;

        $this->checkRolls();

        return $this->calculateTotalScore();
    }

    private function checkRolls()
    {
        foreach ($this->rolls as $roll_order => $roll_mark)
        {
            $current_roll_full_score              = $this->calculateFullRollScore($roll_mark, $roll_order);
            $this->frames[$this->current_frame][] = $current_roll_full_score;

            if ($this->current_frame < self::MAX_FRAMES)
            {
                $this->total_game_score += $current_roll_full_score;
            }

            if ($this->isSecondTryInFrame() || RollValue::STRIKE == $roll_mark || RollValue::SPARE == $roll_mark)
            {
                $this->current_frame++;
            }

            $this->current_roll++;
        }
    }

    private function calculateSimpleRollScore($roll_mark, $roll_order):int
    {
        if ($roll_mark == RollValue::SPARE)
        {
            return self::FRAME_SCORE - $this->rolls[$roll_order - 1];
        }

        return RollValue::fromChar($roll_mark)->value();
    }

    private function calculateFullRollScore($roll_mark, $roll_order)
    {
        $current_roll_simple_score = $this->calculateSimpleRollScore($roll_mark, $roll_order);

        if (!in_array($roll_mark, [RollValue::SPARE, RollValue::STRIKE]))
        {
            return $current_roll_simple_score;
        }

        if ($roll_mark == RollValue::SPARE)
        {
            $current_roll_simple_score += (!empty($this->rolls[$roll_order + 1])) ? $this->calculateSimpleRollScore($this->rolls[$roll_order + 1], $roll_order + 1) : 0;

            return $current_roll_simple_score;
        }

        if ($roll_mark == RollValue::STRIKE)
        {
            $current_roll_simple_score += (!empty($this->rolls[$roll_order + 1])) ? $this->calculateSimpleRollScore($this->rolls[$roll_order + 1], $roll_order + 1) : 0;
            $current_roll_simple_score += (!empty($this->rolls[$roll_order + 2])) ? $this->calculateSimpleRollScore($this->rolls[$roll_order + 2], $roll_order + 2) : 0;

            return $current_roll_simple_score;
        }

        throw new \InvalidArgumentException($roll_mark . ' is an invalid roll.');
    }

    private function calculateTotalScore() : int
    {
        return $this->total_game_score;
    }

    private function isSecondTryInFrame()
    {
        return 2 == count($this->frames[$this->current_frame]);
    }
}
