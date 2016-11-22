<?php

namespace Kata\BowlingKata\Domain;

final class Roll
{
    /** @var string */
    private $mark;

    /** @var int|null */
    private $score;

    /** @var RollType */
    private $type;

    public function __construct(string $a_mark, int $a_score = null)
    {
        $this->mark  = $a_mark;
        $this->score = $a_score;
        $this->type  = RollType::fromMark($a_mark);
    }

    public static function fromMark($a_mark)
    {
        $roll_type = RollType::fromMark($a_mark);

        if ($roll_type->isSpare()) {
            return new self($a_mark);
        }

        if ($roll_type->isStrike()) {
            return new self($a_mark, 10);
        }

        if ($roll_type->isEmpty()) {
            return new self($a_mark, 0);
        }

        return new self($a_mark, (int)$a_mark);
    }

    public function increaseScore($a_score)
    {
        $this->score += $a_score;
    }

    public function type() : RollType
    {
        return $this->type;
    }

    public function score() : int
    {
        return $this->score;
    }
}
