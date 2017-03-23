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

    public function find(int $ft): F
    {
        /** @var F[] $tr */
        $tr = [];

        for ($i = 0; $i < count($this->people); $i++) {
            for ($j = $i + 1; $j < count($this->people); $j++) {

                $r = new F();

                if ($this->people[$i]->birthDate < $this->people[$j]->birthDate) {
                    $r->younger_person = $this->people[$i];
                    $r->older_person = $this->people[$j];
                } else {
                    $r->younger_person = $this->people[$j];
                    $r->older_person = $this->people[$i];
                }

                $r->age_difference = $r->older_person->birthDate->getTimestamp()
                    - $r->younger_person->birthDate->getTimestamp();

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
                    if ($result->age_difference < $answer->age_difference) {
                        $answer = $result;
                    }
                    break;

                case FT::TWO:
                    if ($result->age_difference > $answer->age_difference) {
                        $answer = $result;
                    }
                    break;
            }
        }

        return $answer;
    }
}
