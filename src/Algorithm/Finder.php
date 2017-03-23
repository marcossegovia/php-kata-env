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
        /** @var Comparator[] $sorted_people_from_older_to_younger */
        $sorted_people_from_older_to_younger = [];

        foreach ($this->people as $index => $person)
        {
            for ($j = $index + 1; $j < count($this->people); $j++)
            {
                $person_to_compare_with = $this->people[$j];
                $current_couple         = $this->sortFromOlderToYounger($person, $person_to_compare_with);

                $sorted_people_from_older_to_younger[] = $current_couple;
            }
        }

        if (empty($sorted_people_from_older_to_younger))
        {
            return new Comparator();
        }

        $first_couple = $sorted_people_from_older_to_younger[0];

        $sorting_algorithm = $sorting_type == 1 ? SortClosest::class : SortFurthest::class;
        foreach ($sorted_people_from_older_to_younger as $current_couple)
        {
            $first_couple = (new $sorting_algorithm())->__invoke($current_couple, $first_couple);
        }

        return $first_couple;
    }

    /**
     * @param $person
     * @param $person_to_compare_with
     *
     * @return Comparator
     */
    private function sortFromOlderToYounger($person, $person_to_compare_with): Comparator
    {
        $result = new Comparator();
        if ($this->firstIsOlder($person, $person_to_compare_with))
        {
            $result->first_person  = $person;
            $result->second_person = $person_to_compare_with;
        }
        else
        {
            $result->first_person  = $person_to_compare_with;
            $result->second_person = $person;
        }
        $this->addAgeDifference($result);

        return $result;
    }

    /**
     * @param $person
     * @param $person_to_compare_with
     *
     * @return bool
     */
    private function firstIsOlder($person, $person_to_compare_with): bool
    {
        return $person->birthDate < $person_to_compare_with->birthDate;
    }

    private function addAgeDifference($result)
    {
        $result->age_difference = $result->second_person->birthDate->getTimestamp() - $result->first_person->birthDate->getTimestamp();

        return $result;
    }
}
