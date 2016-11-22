<?php

namespace Kata\BowlingKata\Domain;

final class Game
{
    const MAX_FRAMES_TO_SCORE = 10;

    /** @var RollCollection|Roll[] */
    private $rolls;

    /** @var Frame[] */
    private $frames;

    /** @var int */
    private $score;

    public function __construct(array $a_roll_array)
    {
        $this->rolls  = new RollCollection($a_roll_array);
        $this->frames = [new Frame()];

        $this->calculateGameScore();
    }

    public function score()
    {
        return $this->score;
    }

    private function calculateGameScore()
    {
        foreach ($this->rolls as $roll) {
            $this->calculateRollScore($roll);

            if (count($this->frames) <= self::MAX_FRAMES_TO_SCORE) {
                $this->score += $roll->score();
            }

            $this->addRollToFrame($roll);
        }
    }

    private function addRollToFrame(Roll $roll)
    {
        $current_frame = end($this->frames);
        $current_frame->addRoll($roll);

        if ($current_frame->isComplete()) {
            $this->frames[] = new Frame();
        }
    }

    private function calculateRollScore(Roll $roll)
    {
        if ($roll->type()->isDefault() || $roll->type()->isEmpty()) {
            return;
        }

        $current_roll_pointer = key(current($this->rolls));
        if ($roll->type()->isSpare() && !empty($this->rolls[$current_roll_pointer + 1])) {
            $roll->increaseScore($this->rolls[$current_roll_pointer + 1]->score());
        }

        if ($roll->type()->isStrike() && !empty($this->rolls[$current_roll_pointer + 1])) {
            $roll->increaseScore($this->rolls[$current_roll_pointer + 1]->score());
        }

        if ($roll->type()->isStrike() && !empty($this->rolls[$current_roll_pointer + 2])) {
            $roll->increaseScore($this->rolls[$current_roll_pointer + 2]->score());
        }
    }
}
