<?php

namespace Kata\Rover\Domain\Model;

class Obstacle
{
    private $position;

    private function __construct(Position $a_position)
    {
        $this->position = $a_position;
    }

    public static function create(int $a_col, int $a_row): Obstacle
    {
        $position = Position::create($a_col, $a_row);

        return new Obstacle($position);
    }

    public function position(): Position
    {
        return $this->position;
    }

    public function collide(Position $a_position): bool
    {
        return $this->position->equals($a_position);
    }
}