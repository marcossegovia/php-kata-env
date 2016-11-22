<?php

namespace KataTest\Unit\BowlingKata;

use Kata\BowlingKata\PlayBowling;

class PlayBowlingTest extends \PHPUnit_Framework_TestCase
{
    /** @var PlayBowling */
    private $play_bowling_service;

    /**
     *      - is miss
     *      / is a spare
     *      X is a strike
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
    public function shouldMatchTheSpecifiedFrames($frames, $expectedScore)
    {
        $this->play_bowling_service = new PlayBowling();
        $this->assertEquals($expectedScore, $this->play_bowling_service->__invoke($frames));
    }
}
