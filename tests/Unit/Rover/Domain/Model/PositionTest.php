<?php

namespace Kata\Rover\Domain\Model;

use PHPUnit\Framework\TestCase;

class PositionTest extends TestCase
{
    /** @test  */
    public function shouldAlloCreatingAPositionWithValidCoordinates(): void
    {
        $position = Position::create(1, 2);

        $this->assertEquals(1, $position->col());
        $this->assertEquals(2, $position->row());
    }

    /** @test  */
    public function shouldntAlloCreatingAPositionWithInvalidValidCoordinates(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $position = Position::create(1, -2);
    }
}
