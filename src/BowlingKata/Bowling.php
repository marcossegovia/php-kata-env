<?php

namespace Kata\BowlingKata;

final class Bowling
{
    /** @var int */
    private $score;

    public function __invoke(array $tries) : int
    {
        foreach ($tries as $try)
        {
            $this->throw($try);
        }

        return $this->score();
    }

    private function throw($try)
    {
        if ($this->isPartialScoring($try))
        {
            $this->score += $try;
        }
    }

    private function score() : int
    {
        return $this->score;
    }

    private function isPartialScoring($try)
    {
        return is_int($try);
    }
}
