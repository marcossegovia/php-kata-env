<?php

namespace Kata\Rover;

final class Coordinates
{
    private $coordinate_x;
    private $coordinate_y;

    public function __construct(int $a_coordinate_x, int $a_coordinate_y)
    {
        $this->coordinate_x = $a_coordinate_x;
        $this->coordinate_y = $a_coordinate_y;
    }

    public function coordinateX(): int
    {
        return $this->coordinate_x;
    }

    public function coordinateY(): int
    {
        return $this->coordinate_y;
    }

    public function equals(Coordinates $coordinates): bool
    {
        if ($this->coordinate_x === $coordinates->coordinateX()
            && $this->coordinate_y === $coordinates->coordinateY()) {
            return true;
        }

        return false;
    }
}
