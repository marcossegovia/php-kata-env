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

    public function find(int $ft): PeopleComparison
    {
        /** @var PeopleComparison[] $tr */
        $tr = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $current_people_comparison = new PeopleComparison();

                $first_person = $this->people[$i];
                $second_person = $this->people[$j];

                if ($this->isFirstPersonMoreYoungerThanSecondPerson($i, $j)) {
                    $current_people_comparison->setFirstPerson($first_person);
                    $current_people_comparison->setSecondPerson($second_person);
                } else {
                    $current_people_comparison->setFirstPerson($second_person);
                    $current_people_comparison->setSecondPerson($first_person);
                }

                $current_people_comparison->setBirthdayDifference($current_people_comparison->secondPerson()->birthDate()->getTimestamp()
                    - $current_people_comparison->firstPerson()->birthDate()->getTimestamp());

                $tr[] = $current_people_comparison;
            }
        }

        if (empty($tr)) {
            return new PeopleComparison();
        }

        $answer = $tr[0];

        foreach ($tr as $result) {
            switch ($ft) {
                case FT::ONE:
                    if ($result->birthdayDifference() < $answer->birthdayDifference()) {
                        $answer = $result;
                    }
                    break;

                case FT::TWO:
                    if ($result->birthdayDifference() > $answer->birthdayDifference()) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }

    private function isFirstPersonMoreYoungerThanSecondPerson($first_person_index, $second_person_index): bool
    {
        return $this->people[$first_person_index]->birthDate() < $this->people[$second_person_index]->birthDate();
    }
}
