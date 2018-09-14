<?php

namespace Kata\Rover\Domain\Model;

class Rover
{
    private $map;
    private $position;
    private $orientation;
    private $collissions;

    public function __construct(Map $a_map, Position $a_position, Orientation $an_orientation)
    {
        self::validate();

        $this->map         = $a_map;
        $this->position    = $a_position;
        $this->orientation = $an_orientation;
    }

    public function commands(string ...$movements): void
    {
        foreach ($movements as $movement)
        {
            $this->move($movement);
        }
    }

    private function move(string $movement_string): void
    {
        $movement = Movement::fromString($movement_string);
        if ($movement->isTurn())
        {
            $this->orientation = $this->orientation->turn($movement);

            return;
        }

        if ($movement->isForward())
        {
            $new_position = $this->position->moveForward($this->orientation);
        }
        else
        {
            $new_position = $this->position->moveBackward($this->orientation);
        }

        $normalized_position = $this->map->normalizePosition($new_position);

        if ($this->map->collideWithAnyObstacle($normalized_position))
        {
            $this->collissions[] = $new_position;

            return;
        }

        $this->position = $new_position;
    }

    private static function validate(): void
    {
        return;
    }

    public function position(): Position
    {
        return $this->position;
    }

    /** @return Position[] */
    public function detectedCollisions(): array
    {
        if (null === $this->collissions)
        {
            return [];
        }

        return $this->collissions;
    }
}