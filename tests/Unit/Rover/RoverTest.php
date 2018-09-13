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
            new Coordinates(2, 2),
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

    /** @test
     * @dataProvider commandsProvider
     */
    public function roverShouldBeAbleToProceedMultipleCommands(
        array $commands,
        Coordinates $expected_coordinates,
        Direction $expected_direction
    ): void
    {
        $this->rover->commands($commands);
        $this->assertEquals($expected_coordinates, $this->rover->coordinates());
        $this->assertEquals($expected_direction, $this->rover->direction());
    }

    public function commandsProvider(): array
    {
        return [
            [
                ['f', 'f', 'r', 'f'],
                new Coordinates(2, 3),
                Direction::east(),
            ],
            [
                ['f', 'f', 'r', 'f', 'l', 'f', 'b'],
                new Coordinates(2, 3),
                Direction::north(),
            ],
            [
                ['r', 'f', 'f', 'l', 'f', 'f', 'l', 'f', 'f', 'l', 'f', 'f'],
                new Coordinates(1, 1),
                Direction::south(),
            ],
        ];
    }

    /** @test */
    public function roverShouldReportObstacleWhenEncountering(): void
    {
        $this->rover->commands(['f', 'r', 'f']);
        $this->assertEquals([new Coordinates(2, 2)], $this->rover->obstaclesFound());
    }

    /** @test
     * @dataProvider commandsSurpassLimitsProvider
     */
    public function roverShouldBeRelocatedWithinMapWhenSurpassTheMapLimits(
        array $commands,
        Coordinates $expected_coordinates,
        Direction $expected_direction): void
    {
        $this->rover->commands($commands);
        $this->assertEquals($expected_coordinates, $this->rover->coordinates());
        $this->assertEquals($expected_direction, $this->rover->direction());

    }

    public function commandsSurpassLimitsProvider(): array
    {
        return [
            [
                ['f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f', 'f'],
                new Coordinates(1, 1),
                Direction::north(),
            ],
            [
                ['l', 'f', 'f', 'f'],
                new Coordinates(8, 1),
                Direction::west(),
            ],
            [
                ['l', 'f', 'f', 'f', 'r', 'b', 'b', 'b'],
                new Coordinates(8, 8),
                Direction::north(),
            ]
        ];
    }
}
