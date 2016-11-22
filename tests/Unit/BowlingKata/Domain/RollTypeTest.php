<?php

namespace KataTest\Unit\BowlingKata\Domain;

use Kata\BowlingKata\Domain\RollType;

final class RollTypeTest extends \PHPUnit_Framework_TestCase
{
    /** @test */
    public function should_identify_an_empty_roll_type()
    {
        $mark = '-';
        $roll = RollType::fromMark($mark);
        $this->assertTrue($roll->isEmpty());
    }
    /** @test */
    public function should_identify_a_default_roll_type()
    {
        $mark = '5';
        $roll = RollType::fromMark($mark);
        $this->assertTrue($roll->isDefault());
    }
    /** @test */
    public function should_identify_a_spare_roll_type()
    {
        $mark = '/';
        $roll = RollType::fromMark($mark);
        $this->assertTrue($roll->isSpare());
    }
    /** @test */
    public function should_identify_a_strike_roll_type()
    {
        $mark = 'X';
        $roll = RollType::fromMark($mark);
        $this->assertTrue($roll->isStrike());
    }
}
