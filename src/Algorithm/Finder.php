<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $people;

    public function __construct(array $a_people)
    {
        $this->people = $a_people;
    }

    public function find(int $birthday_sort): PeopleComparison
    {
        /** @var PeopleComparison[] $people_comparisons */
        $people_comparisons = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $current_people_comparison = new PeopleComparison();

                $first_person = $this->people[$i];
                $second_person = $this->people[$j];

                if ($this->isFirstPersonMoreYoungerThanSecondPerson($i, $j)) {
                    $current_people_comparison->setYoungPerson($first_person);
                    $current_people_comparison->setOldPerson($second_person);
                } else {
                    $current_people_comparison->setYoungPerson($second_person);
                    $current_people_comparison->setOldPerson($first_person);
                }

                $people_comparisons[] = $current_people_comparison;
            }
        }

        if (empty($people_comparisons)) {
            return new PeopleComparison();
        }

        return $this->getPeopleComparisonWith($birthday_sort, $people_comparisons);
    }

    private function isFirstPersonMoreYoungerThanSecondPerson($first_person_index, $second_person_index): bool
    {
        return $this->people[$first_person_index]->birthDate() < $this->people[$second_person_index]->birthDate();
    }

    private function getPeopleComparisonWith(int $birthday_sort, array $people_comparisons)
    {
        $answer = $people_comparisons[0];

        foreach ($people_comparisons as $result) {
            switch ($birthday_sort) {
                case BirthdaySort::CLOSEST:
                    if ($result->birthdayDifference() < $answer->birthdayDifference()) {
                        $answer = $result;
                    }
                    break;

                case BirthdaySort::FURTHEST:
                    if ($result->birthdayDifference() > $answer->birthdayDifference()) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }
}
