<?php

namespace Kata\BowlingKata\Domain;

final class RollType
{
    const EMPTY = '-';
    const SPARE = '/';
    const STRIKE = 'X';

    private $type;

    private function __construct($a_type)
    {
        $this->type = $a_type;
    }

    public static function fromMark($a_mark) : RollType
    {
        if (self::EMPTY == $a_mark) {
            return new self('empty');
        }
        if (self::SPARE == $a_mark) {
            return new self('spare');
        }
        if (self::STRIKE == $a_mark) {
            return new self('strike');
        }

        return new self('default');
    }

    public function isEmpty() : bool
    {
        return 'empty' == $this->type;
    }

    public function isDefault() : bool
    {
        return 'default' == $this->type;
    }

    public function isSpare() : bool
    {
        return 'spare' == $this->type;
    }

    public function isStrike() : bool
    {
        return 'strike' == $this->type;
    }
}
