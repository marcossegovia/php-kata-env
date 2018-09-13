<?php

namespace Kata\Rover;

final class Map
{
    private $max_coordinates;
    private $obstacles;

    public function __construct(Coordinates $max_coordinates, array $some_obstacles)
    {
        $this->max_coordinates = $max_coordinates;
        $this->obstacles = $this->normalize($some_obstacles);
    }

    public function obstacles(): array
    {
        return $this->obstacles;
    }

    private function normalize(array $some_obstacles): array
    {
        \array_walk($some_obstacles, function (&$current_coordinate) {
            $current_coordinate = $this->normalizeCoordinate($current_coordinate);
        });
        return $some_obstacles;
    }

    private function normalizeCoordinate(Coordinates $a_coordinate): Coordinates
    {
        if ($a_coordinate->coordinateX() > $this->max_coordinates->coordinateX()) {
            return $this->normalizeCoordinate(
                new Coordinates(
                    $a_coordinate->coordinateX() - $this->max_coordinates->coordinateX(),
                    $a_coordinate->coordinateY()
                )
            );
        }
        if ($a_coordinate->coordinateY() > $this->max_coordinates->coordinateY()) {
            return $this->normalizeCoordinate(
                new Coordinates(
                    $a_coordinate->coordinateX(),
                    $a_coordinate->coordinateY() - $this->max_coordinates->coordinateY()
                )
            );
        }

        return $a_coordinate;
    }

    public function isObstacle(Coordinates $a_coordinate): bool
    {
        foreach ($this->obstacles as $current_obstacle) {
            if ($a_coordinate->equals($current_obstacle)) {
                return true;
            }
        }

        return false;
    }
}
