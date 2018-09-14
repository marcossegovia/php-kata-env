<?php

namespace Kata\Rover\Domain\Model;

class Orientation
{
    private $orientation;

    private function __construct(string $orientation)
    {
        $this->orientation = $orientation;
    }

    public static function NORTH(): Orientation
    {
        return new self('N');
    }

    public static function SOUTH(): Orientation
    {
        return new self('S');
    }

    public static function EAST(): Orientation
    {
        return new self('E');
    }

    public static function WEST(): Orientation
    {
        return new self('W');
    }

    public function isNorth(): bool
    {
        return $this->orientation === 'N';
    }

    public function isSouth(): bool
    {
        return $this->orientation === 'S';
    }

    public function isEast(): bool
    {
        return $this->orientation === 'E';
    }

    public function isWest(): bool
    {
        return $this->orientation === 'W';
    }

    public function turn(Movement $movement): Orientation
    {
        if (($movement->isLeft() && $this->isEast()) || ($movement->isRight() && $this->isWest()))
        {
            return self::NORTH();
        }

        if (($movement->isLeft() && $this->isWest()) || ($movement->isRight() && $this->isEast()))
        {
            return self::SOUTH();
        }

        if (($movement->isLeft() && $this->isSouth()) || ($movement->isRight() && $this->isNorth()))
        {
            return self::EAST();
        }

        if (($movement->isLeft() && $this->isNorth()) || ($movement->isRight() && $this->isSouth()))
        {
            return self::WEST();
        }
    }
}