<?php

namespace Kata\BowlingKata;

final class BowlingGame
{
    const MAX_FRAMES = 10;

    private $total_game_score = 0;
    private $frames = [];
    private $current_frame = 0;
    private $rolls = [];
    private $current_roll = 0;

    public function __invoke(array $rolls) : int
    {
        $this->rolls = $rolls;

        foreach ($this->rolls as $roll_order => $roll_mark)
        {
            $roll_score = $this->calculateRollScore($roll_mark, $roll_order);

            $this->frames[$this->current_frame][] = $roll_score;

            if ($this->current_frame < self::MAX_FRAMES)
            {
                $this->total_game_score += $roll_score;
            }

            if ($this->isSecondTryInFrame() || $this->isStrike($roll_mark) || $this->isSpare($roll_mark))
            {
                $this->current_frame++;
            }

            $this->current_roll++;
        }

        return $this->score();
    }

    private function calculateRollScore($roll_mark, $roll_order)
    {
        if ($this->isPartialScoring($roll_mark))
        {
            $current_roll_simple_score = $roll_mark;

            return $current_roll_simple_score;
        }

        if ($this->isSpare($roll_mark))
        {
            $current_roll_simple_score = 10 - $this->rolls[$roll_order - 1];

            if ($roll_order != $this->current_roll)
            {
                return $current_roll_simple_score;
            }

            $next_roll_score_1 = (!empty($this->rolls[$roll_order + 1])) ? $this->calculateRollScore($this->rolls[$roll_order + 1], $roll_order + 1) : 0;

            return $current_roll_simple_score + $next_roll_score_1;
        }

        if ($this->isStrike($roll_mark))
        {
            $current_roll_simple_score = 10;

            if ($roll_order != $this->current_roll)
            {
                return $current_roll_simple_score;
            }

            $next_roll_score_1 = (!empty($this->rolls[$roll_order + 1])) ? $this->calculateRollScore($this->rolls[$roll_order + 1], $roll_order + 1) : 0;
            $next_roll_score_2 = (!empty($this->rolls[$roll_order + 2])) ? $this->calculateRollScore($this->rolls[$roll_order + 2], $roll_order + 2) : 0;

            return $current_roll_simple_score + $next_roll_score_1 + $next_roll_score_2;
        }

        return 0;
    }

    private function score() : int
    {
        return $this->total_game_score;
    }

    private function isPartialScoring($try)
    {
        return is_int($try);
    }

    private function isSpare($try)
    {
        return '/' == $try;
    }

    private function isStrike($try)
    {
        return 'X' == $try;
    }

    private function isSecondTryInFrame()
    {
        return 2 == count($this->frames[$this->current_frame]);
    }
}
