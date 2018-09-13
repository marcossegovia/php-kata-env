<?php

namespace Kata\Rover;

final class Rover
{
    private $map;
    private $coordinates;
    private $direction;

    public function __construct(Map $a_map, Coordinates $a_starting_point, Direction $a_direction)
    {
        $this->map = $a_map;
        $this->coordinates = $a_starting_point;
        $this->direction = $a_direction;
    }

    public function map(): Map
    {
        return $this->map;
    }

    public function coordinates(): Coordinates
    {
        return $this->coordinates;
    }

    public function direction(): Direction
    {
        return $this->direction;
    }

    public function commands(array $commands): void
    {
        foreach ($commands as $command) {
            $this->process($command);
        }
    }

    private function process(string $command): void
    {
        if ('f' === $command) {
            $this->coordinates = new Coordinates(
                $this->coordinates->coordinateX(),
                $this->coordinates->coordinateY() + 1
            );
        }
        if ('b' === $command) {
            $this->coordinates = new Coordinates(
                $this->coordinates->coordinateX(),
                $this->coordinates->coordinateY() - 1
            );
        }
        if ('r' === $command) {
            $this->direction = $this->direction->turnRight();
        }
        if ('l' === $command) {
            $this->direction = $this->direction->turnLeft();
        }
    }
}
