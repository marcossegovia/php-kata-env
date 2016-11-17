<?php

namespace Kata\BowlingKata;

final class Bowling
{
    public function __invoke(array $frames) : int
    {
        return $frames[0];
    }
}
