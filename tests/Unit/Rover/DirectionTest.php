<?php

namespace Kata\Unit\Rover;

use Kata\Rover\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    /** @test */
    public function newInstanceShouldRetrieveGivenDirections()
    {
        $this->assertEquals(Direction::NORTH, Direction::north()->direction());
        $this->assertEquals(Direction::SOUTH, Direction::south()->direction());
        $this->assertEquals(Direction::EAST, Direction::east()->direction());
        $this->assertEquals(Direction::WEST, Direction::west()->direction());
    }
}
