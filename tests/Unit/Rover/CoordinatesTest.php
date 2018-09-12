<?php

namespace Kata\Unit\Rover;

use Kata\Rover\Coordinates;
use PHPUnit\Framework\TestCase;

class CoordinatesTest extends TestCase
{
    private static $coordinate_x = 5;
    private static $coordinate_y = 9;

    /** @var Coordinates */
    private $coordinates;

    public function setUp()
    {
        $this->coordinates = new Coordinates(self::$coordinate_x, self::$coordinate_y);
    }

    /** @test */
    public function newInstanceShouldRetrieveGivenParams(): void
    {
        $this->assertEquals(self::$coordinate_x, $this->coordinates->coordinateX());
        $this->assertEquals(self::$coordinate_y, $this->coordinates->coordinateY());
    }

    /** @test */
    public function sameCoordinatesShouldBeEqual(): void
    {
        $this->assertTrue($this->coordinates->equals(new Coordinates(self::$coordinate_x, self::$coordinate_y)));
    }
}
