<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $people;

    public function __construct(array $people)
    {
        $this->people = $people;
    }

    public function findByBirthdaysDistance(int $find_criteria): Couple
    {
        /** @var Couple[] $all_possible_couples */
        $all_possible_couples = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $couple = new Couple();

                if ($this->people[$i]->birthDate() < $this->people[$j]->birthDate()) {
                    $couple->younger = $this->people[$i];
                    $couple->older      = $this->people[$j];
                } else {
                    $couple->younger = $this->people[$j];
                    $couple->older      = $this->people[$i];
                }

                $couple->birthday_distance_in_seconds = $couple->older->birthDate()->getTimestamp()
                    - $couple->younger->birthDate()->getTimestamp();

                $all_possible_couples[] = $couple;
            }
        }

        if (count($all_possible_couples) < 1) {
            return new Couple();
        }

        $answer = $all_possible_couples[0];

        foreach ($all_possible_couples as $result) {
            switch ($find_criteria) {
                case FindByBirthdaysCriteria::CLOSEST_BIRTHDAY:
                    if ($result->birthday_distance_in_seconds < $answer->birthday_distance_in_seconds) {
                        $answer = $result;
                    }
                    break;

                case FindByBirthdaysCriteria::FURTHEST_BIRTHDAY:
                    if ($result->birthday_distance_in_seconds > $answer->birthday_distance_in_seconds) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }
}
