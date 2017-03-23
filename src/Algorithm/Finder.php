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

    public function find(int $ft): F
    {
        /** @var F[] $tr */
        $tr = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {
                $r = new F();

                if ($this->isFirstPersonMoreYoungerThanSecondPerson($i, $j)) {
                    $r->first_person = $this->people[$i];
                    $r->second_person = $this->people[$j];
                } else {
                    $r->first_person = $this->people[$j];
                    $r->second_person = $this->people[$i];
                }

                $r->birthday_difference = $r->second_person->birthDate->getTimestamp()
                    - $r->first_person->birthDate->getTimestamp();

                $tr[] = $r;
            }
        }

        if (count($tr) < 1) {
            return new F();
        }

        $answer = $tr[0];

        foreach ($tr as $result) {
            switch ($ft) {
                case FT::ONE:
                    if ($result->birthday_difference < $answer->birthday_difference) {
                        $answer = $result;
                    }
                    break;

                case FT::TWO:
                    if ($result->birthday_difference > $answer->birthday_difference) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }

    private function isFirstPersonMoreYoungerThanSecondPerson($first_person, $second_person): bool
    {
        return $this->people[$first_person]->birthDate < $this->people[$second_person]->birthDate;
    }
}
