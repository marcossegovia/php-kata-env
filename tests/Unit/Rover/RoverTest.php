<?php

namespace Kata\Unit\Rover;

use Kata\Rover\Coordinates;
use Kata\Rover\Direction;
use Kata\Rover\Map;
use Kata\Rover\Rover;
use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    /** @var Rover */
    private $rover;

    public function setUp()
    {
        $obstacles = [
            new Coordinates(1, 1),
            new Coordinates(3, 1)
        ];
        $map = new Map(new Coordinates(10, 10), $obstacles);

        $starting_point = new Coordinates(1, 1);
        $direction = Direction::north();
        $this->rover = new Rover($map, $starting_point, $direction);
    }

    /** @test */
    public function newInstanceShouldSetRoverInTheGivenStartingPoint(): void
    {
        $this->assertEquals(new Coordinates(1, 1), $this->rover->coordinates());
    }

    /** @test */
    public function roverShouldMoveForwardWhenPassingF(): void
    {
        $this->rover->commands(['f']);
        $this->assertEquals(new Coordinates(1, 2), $this->rover->coordinates());
    }

    /** @test */
    public function roverShouldMoveBackwardWhenPassingB(): void
    {
        $this->rover->commands(['b']);
        $this->assertEquals(new Coordinates(1, 0), $this->rover->coordinates());
    }

    /** @test */
    public function roverShouldTurnRightWhenPassingR(): void
    {
        $this->rover->commands(['r']);
        $this->assertEquals(new Coordinates(1, 1), $this->rover->coordinates());
        $this->assertEquals(Direction::east(), $this->rover->direction());
    }

    /** @test */
    public function roverShouldTurnLeftWhenPassingL(): void
    {
        $this->rover->commands(['l']);
        $this->assertEquals(new Coordinates(1, 1), $this->rover->coordinates());
        $this->assertEquals(Direction::west(), $this->rover->direction());
    }
}
