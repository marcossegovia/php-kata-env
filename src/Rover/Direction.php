<?php

namespace Kata\Rover;

final class Direction
{
    public const NORTH = 'n';
    public const SOUTH = 's';
    public const EAST = 'e';
    public const WEST = 'w';

    private $direction;

    private function __construct(string $direction)
    {
        $this->direction = $direction;
    }

    public static function north(): Direction
    {
        return new self(Direction::NORTH);
    }

    public static function south(): Direction
    {
        return new self(Direction::SOUTH);
    }

    public static function east(): Direction
    {
        return new self(Direction::EAST);
    }

    public static function west(): Direction
    {
        return new self(Direction::WEST);
    }

    public function direction(): string
    {
        return $this->direction;
    }
}
