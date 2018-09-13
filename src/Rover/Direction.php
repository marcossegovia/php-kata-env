<?php

namespace Kata\Rover;

final class Direction
{
    public const NORTH = 'n';
    public const SOUTH = 's';
    public const EAST = 'e';
    public const WEST = 'w';

    public const DIRECTIONS = [
        self::NORTH => [
            'right' => self::EAST,
            'left' => self::WEST
        ],
        self::EAST => [
            'right' => self::SOUTH,
            'left' => self::NORTH
        ],
        self::SOUTH => [
            'right' => self::WEST,
            'left' => self::EAST
        ],
        self::WEST => [
            'right' => self::NORTH,
            'left' => self::SOUTH
        ]
    ];

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

    public function turnRight(): Direction
    {
        return new Direction(self::DIRECTIONS[$this->direction]['right']);
    }

    public function turnLeft(): Direction
    {
        return new Direction(self::DIRECTIONS[$this->direction]['left']);
    }

    public function direction(): string
    {
        return $this->direction;
    }
}
