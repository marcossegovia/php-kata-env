<?php

namespace Kata\BowlingKata;

final class Bowling
{
    /** @var int */
    private $score = 0;

    private $frames = [];

    private $current_frame = 0;

    private $tries = [];

    private $current_try = 0;

    public function __invoke(array $tries) : int
    {
        $this->tries = $tries;

        foreach ($this->tries as $try_order => $try_value)
        {
            $try_score = $this->calculateTryScore($try_value, $try_order);

            $this->frames[$this->current_frame][] = $try_score;

            if ($this->current_frame < 10)
            {
                $this->score += $try_score;
            }

            if ($this->isSecondTryInFrame() || $this->isStrike($try_value) || $this->isSpare($try_value))
            {
                $this->current_frame++;
            }

            $this->current_try++;
        }

        return $this->score();
    }

    private function calculateTryScore($try_value, $try_order)
    {
        if ($this->isPartialScoring($try_value))
        {
            $current_frame_simple_score = $try_value;

            return $current_frame_simple_score;
        }

        if ($this->isSpare($try_value))
        {
            $current_frame_simple_score = 10 - $this->tries[$try_order - 1];

            if ($try_order != $this->current_try) return $current_frame_simple_score;

            $next_try_score_1 = (!empty($this->tries[$try_order + 1])) ? $this->calculateTryScore($this->tries[$try_order + 1], $try_order + 1) : 0;

            return $current_frame_simple_score + $next_try_score_1;
        }

        if ($this->isStrike($try_value))
        {
            $current_frame_simple_score = 10;

            if ($try_order != $this->current_try) return $current_frame_simple_score;

            $next_try_score_1 = (!empty($this->tries[$try_order + 1])) ? $this->calculateTryScore($this->tries[$try_order + 1], $try_order + 1) : 0;
            $next_try_score_2 = (!empty($this->tries[$try_order + 2])) ? $this->calculateTryScore($this->tries[$try_order + 2], $try_order + 2) : 0;

            return $current_frame_simple_score + $next_try_score_1 + $next_try_score_2;
        }

        return 0;
    }

    private function score() : int
    {
        return $this->score;
    }

    private function isEmpty($try)
    {
        return '-' == $try;
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
