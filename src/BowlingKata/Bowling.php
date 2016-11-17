<?php

namespace Kata\BowlingKata;

final class Bowling
{
    public function __invoke(array $tries) : int
    {
        $punctuation = 0;

        foreach ($tries as $num_try => $try)
        {
            if ($this->isATryWithStrike($try))
            {
                $current_punctuation = 10 + $tries[$num_try+1] + $tries[$num_try+2];
                $punctuation+= $current_punctuation;
                continue;
            }

            if ($this->isAFrameWithSpare($tries, $num_try))
            {
                $current_punctuation = 10 + $tries[$num_try+2];

                $punctuation+=$current_punctuation;
                continue;
            }

            $punctuation+= $try;
        }

        return $punctuation;
    }

    private function isAFrameWithSpare($tries, $num_try)
    {
        return isset($tries[$num_try+1]) && $tries[$num_try+1]  === '/';
    }

    private function isATryWithStrike($try)
    {
        return $try === 'X';
    }
}
