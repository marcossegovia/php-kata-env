<?php

namespace Kata\Algorithm;

final class SortFurthest
{
    public function __invoke($current_couple, $first_couple)
    {
        if ($current_couple->age_difference > $first_couple->age_difference)
        {
            $first_couple = $current_couple;
        }

        return $first_couple;
    }
}
