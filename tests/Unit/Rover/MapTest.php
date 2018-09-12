<?php

namespace Kata\Unit\Rover;

use Kata\Rover\Coordinates;
use Kata\Rover\Map;
use PHPUnit\Framework\TestCase;

class MapTest extends TestCase
{
    /** @var Map */
    private $map;

    public function setUp()
    {
        $obstacles = [
            new Coordinates(1, 1),
            new Coordinates(3, 1)
        ];
        $this->map = new Map(new Coordinates(10, 10), $obstacles);
    }

    /** @test */
    public function newInstanceShouldAcceptObstaclesInsideMap(): void
    {
        $this->assertEquals([
            new Coordinates(1, 1),
            new Coordinates(3, 1)
        ], $this->map->obstacles());
    }

    /** @test */
    public function newInstanceShouldGetNormalizedObstaclesInsideMap(): void
    {
        $obstacles = [
            new Coordinates(15, 15),
            new Coordinates(3, 1),
            new Coordinates(20, 20),
            new Coordinates(12, 12),
        ];
        $this->map = new Map(new Coordinates(10, 10), $obstacles);
        $this->assertEquals([
            new Coordinates(5, 5),
            new Coordinates(3, 1),
            new Coordinates(10, 10),
            new Coordinates(2, 2),
        ], $this->map->obstacles());
    }
}
