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

    public function find(int $couple_type): Couple
    {
        /** @var Couple[] $couple_array */
        $couple_array = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {

                $couple = new Couple();

                if ($this->people[$i]->birthDate < $this->people[$j]->birthDate) {
                    $couple->person_1 = $this->people[$i];
                    $couple->person_2 = $this->people[$j];
                } else {
                    $couple->person_1 = $this->people[$j];
                    $couple->person_2 = $this->people[$i];
                }

                $couple->age_difference = $couple->person_2->birthDate->getTimestamp() - $couple->person_1->birthDate->getTimestamp();

                $couple_array[] = $couple;
            }
        }

        if (count($couple_array) < 1) {
            return new Couple();
        }

        $answer = $couple_array[0];

        foreach ($couple_array as $couple_candidate) {
            switch ($couple_type) {
                case CoupleType::CLOSE:
                    if ($couple_candidate->age_difference < $answer->age_difference) {
                        $answer = $couple_candidate;
                    }
                    break;

                case CoupleType::FURTHER:
                    if ($couple_candidate->age_difference > $answer->age_difference) {
                        $answer = $couple_candidate;
                    }
                    break;
            }
        }

        return $answer;
    }
}
