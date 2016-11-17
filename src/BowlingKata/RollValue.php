<?php

namespace Kata\BowlingKata;

final class RollValue
{
    const EMPTY = '-';
    const SPARE = '/';
    const STRIKE = 'X';

    /** @var int */
    private $value;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public static function fromChar($char)
    {
        if (in_array($char, [self::EMPTY, self::SPARE]))
        {
            return new self(0);
        }
        if (self::STRIKE == $char)
        {
            return new self(10);
        }

        return new self($char);
    }

    public function value()
    {
        return $this->value;
    }
}
