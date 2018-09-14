<?php

namespace Kata\Rover\Domain\Model;

class Position
{
    private $col;
    private $row;

    public function __construct(int $a_col, int $a_row)
    {
        $this->col = $a_col;
        $this->row = $a_row;
    }

    public static function create(int $a_col, int $a_row): Position
    {
        self::validate($a_col, $a_row);

        return new self($a_col, $a_row);
    }

    private static function validate(int $x, int $y): void
    {
        if ($x < 0 || $y < 0)
        {
            throw new \InvalidArgumentException('Invalid coordinates');
        }
    }

    public function col(): int
    {
        return $this->col;
    }

    public function row(): int
    {
        return $this->row;
    }

    public function equals(Position $a_position): bool
    {
        return $this->col === $a_position->col && $this->row === $a_position->row;
    }

    public function moveForward(Orientation $orientation): Position
    {
        if ($orientation->isNorth())
        {
            return self::create($this->col, $this->row + 1);
        }
        if ($orientation->isSouth())
        {
            return self::create($this->col, $this->row - 1);
        }
        if ($orientation->isEast())
        {
            return self::create($this->col + 1, $this->row);
        }
        if ($orientation->isWest())
        {
            return self::create($this->col - 1, $this->row);
        }
    }

    public function moveBackward(Orientation $orientation): Position
    {
        if ($orientation->isNorth())
        {
            return self::create($this->col, $this->row - 1);
        }
        if ($orientation->isSouth())
        {
            return self::create($this->col, $this->row + 1);
        }
        if ($orientation->isEast())
        {
            return self::create($this->col - 1, $this->row);
        }
        if ($orientation->isWest())
        {
            return self::create($this->col + 1, $this->row);
        }
    }
}