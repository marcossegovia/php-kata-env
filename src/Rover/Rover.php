<?php

namespace Kata\Rover;

final class Rover
{
    private $map;
    private $coordinates;
    private $direction;
    private $obstacles_found;

    public function __construct(Map $a_map, Coordinates $a_starting_point, Direction $a_direction)
    {
        $this->map = $a_map;
        $this->coordinates = $a_starting_point;
        $this->direction = $a_direction;
        $this->obstacles_found = [];
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
            $this->coordinates = $this->moveForward();
        }
        if ('b' === $command) {
            $this->coordinates = $this->moveBackwards();
        }
        if ('r' === $command) {
            $this->direction = $this->direction->turnRight();
        }
        if ('l' === $command) {
            $this->direction = $this->direction->turnLeft();
        }
    }

    private function moveForward(): Coordinates
    {
        return $this->move($this->direction);
    }

    private function moveBackwards(): Coordinates
    {
        return $this->move($this->direction->inverseDirection());
    }

    private function move(Direction $a_direction): Coordinates
    {
        switch ($a_direction->direction()) {
            case Direction::NORTH:
                $new_coordinates = new Coordinates(
                    $this->coordinates->coordinateX(),
                    $this->coordinates->coordinateY() + 1
                );
                $new_coordinates = $this->map->normalizeCoordinate($new_coordinates);
                if (!$this->map->isObstacle($new_coordinates)) {
                    return $new_coordinates;
                }
                $this->obstacles_found[] = $new_coordinates;
                return $this->coordinates;
            case Direction::SOUTH:
                $new_coordinates = new Coordinates(
                    $this->coordinates->coordinateX(),
                    $this->coordinates->coordinateY() - 1
                );
                $new_coordinates = $this->map->normalizeCoordinate($new_coordinates);
                if (!$this->map->isObstacle($new_coordinates)) {
                    return $new_coordinates;
                }
                $this->obstacles_found[] = $new_coordinates;
                return $this->coordinates;
            case Direction::EAST:
                $new_coordinates = new Coordinates(
                    $this->coordinates->coordinateX() + 1,
                    $this->coordinates->coordinateY()
                );
                $new_coordinates = $this->map->normalizeCoordinate($new_coordinates);
                if (!$this->map->isObstacle($new_coordinates)) {
                    return $new_coordinates;
                }
                $this->obstacles_found[] = $new_coordinates;
                return $this->coordinates;
            case Direction::WEST:
                $new_coordinates = new Coordinates(
                    $this->coordinates->coordinateX() - 1,
                    $this->coordinates->coordinateY()
                );
                $new_coordinates = $this->map->normalizeCoordinate($new_coordinates);
                if (!$this->map->isObstacle($new_coordinates)) {
                    return $new_coordinates;
                }
                $this->obstacles_found[] = $new_coordinates;
                return $this->coordinates;
        }
    }

    public function obstaclesFound(): array
    {
        return $this->obstacles_found;
    }
}
