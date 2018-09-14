<?php

namespace Kata\Rover\Domain\Model;

class Map
{
    private $width;
    private $height;
    private $obstacles;

    public function __construct(int $a_width, int $a_height, Obstacle ...$obstacles_array)
    {
        $this->width     = $a_width;
        $this->height    = $a_height;
        $this->obstacles = $obstacles_array;
    }

    public function width(): int
    {
        return $this->width;
    }

    public function height(): int
    {
        return $this->height;
    }

    public function collideWithAnyObstacle(Position $a_position): bool
    {
        foreach ($this->obstacles as $obstacle)
        {
            if ($obstacle->collide($a_position))
            {
                return true;
            }
        }

        return false;
    }

    public function normalizePosition(Position $new_position): Position
    {
        return $new_position;
    }
}