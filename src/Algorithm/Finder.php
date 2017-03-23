<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $people;

    public function __construct(array $all_people)
    {
        $this->people = $all_people;
    }

    public function find(int $sorting_type): Comparator
    {
        /** @var Comparator[] $comparators */
        $comparators = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $r = new Comparator();

                if ($this->people[$i]->birthDate < $this->people[$j]->birthDate) {
                    $r->first_person = $this->people[$i];
                    $r->second_person           = $this->people[$j];
                } else {
                    $r->first_person = $this->people[$j];
                    $r->second_person           = $this->people[$i];
                }

                $r->difference_number = $r->second_person->birthDate->getTimestamp()
                    - $r->first_person->birthDate->getTimestamp();

                $comparators[] = $r;
            }
        }

        if (count($comparators) < 1) {
            return new Comparator();
        }

        $first = $comparators[0];

        foreach ($comparators as $result) {
            switch ($sorting_type) {
                case Sorting::HIGHER_TO_LOWER:
                    if ($result->difference_number < $first->difference_number) {
                        $first = $result;
                    }
                    break;

                case Sorting::LOWER_TO_HIGHER:
                    if ($result->difference_number > $first->difference_number) {
                        $first = $result;
                    }
                    break;
            }
        }

        return $first;
    }
}
