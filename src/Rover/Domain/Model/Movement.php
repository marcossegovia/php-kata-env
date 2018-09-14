<?php

namespace Kata\Rover\Domain\Model;

class Movement
{
    private $movement;

    private function __construct(string $movement)
    {
        $this->movement = $movement;
    }

    public static function fromString($movement): Movement
    {
        return new self($movement);
    }

    public function isForward(): bool
    {
        return 'f' === $this->movement;
    }

    public function isBackward(): bool
    {
        return 'b' === $this->movement;
    }

    public function isLeft(): bool
    {
        return 'l' === $this->movement;
    }

    public function isRight(): bool
    {
        return 'r' === $this->movement;
    }

    public function isTurn(): bool
    {
        return $this->isLeft() || $this->isRight();
    }
}