<?php

namespace Kata\BowlingKata;

final class Bowling
{
    public function __invoke(array $tries) : int
    {
        $punctuation = 0;

        foreach ($tries as $num_try => $try)
        {
            $punctuation+= $try;
        }

        return $punctuation;
    }
}
