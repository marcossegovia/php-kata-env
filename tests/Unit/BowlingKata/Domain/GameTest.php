<?php

namespace KataTest\Unit\BowlingKata\Domain;

use Kata\BowlingKata\Domain\Game;

final class GameTest extends \PHPUnit_Framework_TestCase
{
    /**
     *  - is miss
     *  / is a spare
     *  X is a strike
     */
    public function frameProvider()
    {
		return [
            'testThrowing9PinsInFirstFrame'								=> [[9, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 9],
            'testThrowing5PinsInFirstFrame'								=> [[5, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 5],
            'testThrowing12PinsInFirstFrameWithoutStrike'				=> [[9, 3, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 12],
            'testThrowing12PinsInSecondFrameWithoutStrike'				=> [['-', '-', 9, 3, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 12],
            'testThrowing12PinsBetweenFirstAndSecondFrameWithoutStrike'	=> [[9, '-', '-', 3, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 12],
            'testThrowingSpareInFirstFrameAnd2PinsInSecondIs14'			=> [[5, '/', 2, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 14],
            'testThrowingSpareInFirstFrameAnd2And3PinsInSecondIs17'		=> [[5, '/', 2, 3, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 17],
            'testOneStrikeInFirstThrowIs10'								=> [['X', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 10],
            'testOneStrikeInFirstThrowAnd2PinsIs14'						=> [['X', 2, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 14],
            'testOneStrikeInFirstThrowAnd2And3PinsIs20'					=> [['X', 2, 3, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-'], 20],
            'testComplexFrameThatScores81'								=> [['X', 2, 3, 4, '/', 2, 5, 'X', 'X', 2, 3, '-', '-', '-', '-', '-', '-'], 81],
            'testEndingInSpare'											=> [[2, 3, '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '/', 2], 17],
            'testEndingInStrike'										=> [['-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'X', 'X', 'X'], 30],
            'testFullStrikes'											=> [['X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X', 'X'], 300],
            'testEndingInStrikeAndSpare'								=> [['-', '-', 2, 3, 'X', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', '-', 'X', 2, '/'], 35],
            'test10PairsOf9AndMiss'										=> [[9, '-', 9, '-', 9, '-', 9, '-', 9, '-', 9, '-', 9, '-', 9, '-', 9, '-', 9, '-'], 90],
            'test10PairsOf5AndSpareWithFinal5'							=> [[5, '/', 5, '/', 5, '/', 5, '/', 5, '/', 5, '/', 5, '/', 5, '/', 5, '/', 5, '/', 5], 150]
        ];
    }

    /**
     * @dataProvider frameProvider
     * @test
     */
    public function shouldMatchTheSpecifiedFrames($a_roll_array, $expected_score)
    {
        $game = new Game($a_roll_array);
        $this->assertEquals($expected_score, $game->score());
    }
}
