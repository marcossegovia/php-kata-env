<?php

namespace Kata\Rover\Domain\Model;

use PHPUnit\Framework\TestCase;

class RoverTest extends TestCase
{
    /**
     * @dataProvider cleanMovementsDataProvider
     * @test
     *
     * @param array       $obstacles
     * @param array       $map_dimensions
     * @param array       $rover_position
     * @param Orientation $orientation
     * @param array       $movements
     * @param array       $expected_position
     */
    public function shouldMoveOnGivenDirection(
        array $obstacles,
        array $map_dimensions,
        array $rover_position,
        Orientation $orientation,
        array $movements,
        array $expected_position
    ): void
    {
        $obstacles_array = [];
        foreach ($obstacles as $obstacle)
        {
            $obstacles_array[] = Obstacle::create($obstacle[0],$obstacle[1]);
        }
        $map       = new Map($map_dimensions[0], $map_dimensions[1], ...$obstacles_array);
        $rover     = new Rover($map, Position::create($rover_position[0], $rover_position[1]), $orientation);

        $rover->commands(...$movements);

        $this->assertEquals($expected_position[0], $rover->position()->col());
        $this->assertEquals($expected_position[1], $rover->position()->row());
    }

    public function cleanMovementsDataProvider(): array
    {
        return [
            [
                [[3, 3], [5, 5]],
                [10, 10],
                [0, 0],
                Orientation::EAST(),
                ['f'],
                [1, 0]
            ],
            [
                [[3, 3], [5, 5]],
                [10, 10],
                [0, 0],
                Orientation::EAST(),
                ['f','f','f','l','f','f','f','r','f'],
                [4, 2]
            ],
        ];
    }
}
