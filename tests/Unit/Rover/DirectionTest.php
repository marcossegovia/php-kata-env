<?php

namespace Kata\Unit\Rover;

use Kata\Rover\Direction;
use PHPUnit\Framework\TestCase;

class DirectionTest extends TestCase
{
    /** @var Direction */
    private $direction;

    public function setUp()
    {
        $this->direction = Direction::north();
    }

    /** @test */
    public function newInstanceShouldRetrieveGivenDirections()
    {
        $this->assertEquals(Direction::NORTH, Direction::north()->direction());
        $this->assertEquals(Direction::SOUTH, Direction::south()->direction());
        $this->assertEquals(Direction::EAST, Direction::east()->direction());
        $this->assertEquals(Direction::WEST, Direction::west()->direction());
    }

    /** @test */
    public function shouldPointEastWhenTurnRight()
    {
        $this->direction = $this->direction->turnRight();
        $this->assertEquals(Direction::east(), $this->direction);
    }

    /** @test */
    public function shouldPointSouthWhenTurnRightTwice()
    {
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->assertEquals(Direction::south(), $this->direction);
    }

    /** @test */
    public function shouldPointWestWhenTurnRight3times()
    {
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->assertEquals(Direction::west(), $this->direction);
    }

    /** @test */
    public function shouldPointNorthWhenTurnRight4times()
    {
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->assertEquals(Direction::north(), $this->direction);
    }

    /** @test */
    public function shouldPointWestWhenTurnLeft()
    {
        $this->direction = $this->direction->turnLeft();
        $this->assertEquals(Direction::west(), $this->direction);
    }

    /** @test */
    public function shouldPointSouthWhenTurnLeftTwice()
    {
        $this->direction = $this->direction->turnLeft();
        $this->direction = $this->direction->turnLeft();
        $this->assertEquals(Direction::south(), $this->direction);
    }

    /** @test */
    public function shouldPointEastWhenTurnLeft3times()
    {
        $this->direction = $this->direction->turnLeft();
        $this->direction = $this->direction->turnLeft();
        $this->direction = $this->direction->turnLeft();
        $this->assertEquals(Direction::east(), $this->direction);
    }

    /** @test */
    public function shouldPointNorthWhenTurnLeft4times()
    {
        $this->direction = $this->direction->turnLeft();
        $this->direction = $this->direction->turnLeft();
        $this->direction = $this->direction->turnLeft();
        $this->direction = $this->direction->turnLeft();
        $this->assertEquals(Direction::north(), $this->direction);
    }

    /** @test */
    public function shouldPointSouthWhenAskingForInverseDirection()
    {
        $this->direction = $this->direction->inverseDirection();
        $this->assertEquals(Direction::south(), $this->direction);
    }

    /** @test */
    public function shouldPointWestWhenAskingForInverseDirectionAfterTurningRight()
    {
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->inverseDirection();
        $this->assertEquals(Direction::west(), $this->direction);
    }

    /** @test */
    public function shouldPointNorthWhenAskingForInverseDirectionAfterTurningRightTwice()
    {
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->inverseDirection();
        $this->assertEquals(Direction::north(), $this->direction);
    }

    /** @test */
    public function shouldPointNorthWhenAskingForInverseDirectionAfterTurningRight3Times()
    {
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->turnRight();
        $this->direction = $this->direction->inverseDirection();
        $this->assertEquals(Direction::east(), $this->direction);
    }
}
