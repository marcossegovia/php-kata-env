<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $people;

    /** @var Couple[] */
    private $couples;

    public function __construct(array $people)
    {
        $this->people  = $people;
        $this->couples = $this->getCouples($people);
    }

    public function findByBirthdaysDistance(int $find_criteria): Couple
    {
        if (empty($this->couples)) {
            return new CoupleEmpty();
        }

        $selected_couple = $this->couples[0];

        foreach ($this->couples as $couple) {
            switch ($find_criteria) {
                case FindByBirthdaysCriteria::CLOSEST_BIRTHDAY:
                    if ($couple->birthday_distance_in_seconds < $selected_couple->birthday_distance_in_seconds) {
                        $selected_couple = $couple;
                    }
                    break;

                case FindByBirthdaysCriteria::FURTHEST_BIRTHDAY:
                    if ($couple->birthday_distance_in_seconds > $selected_couple->birthday_distance_in_seconds) {
                        $selected_couple = $couple;
                    }
                    break;
            }
        }

        return $selected_couple;
    }

    private function getCouples(array $people): array
    {
        $couples = [];
        for ($i = 0; $i < count($people); $i++) {
            for ($j = $i + 1; $j < count($people); $j++) {
                $couples[] = new Couple($people[$i], $people[$j]);
            }
        }

        return $couples;
    }
}
