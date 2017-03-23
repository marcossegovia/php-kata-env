<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class Finder
{
    /** @var Person[] */
    private $people;

    private $couple_type;

    public function __construct(array $people)
    {
        $this->people = $people;
    }

    public function find(int $couple_type): Couple
    {
        $this->couple_type = $couple_type;

        /** @var Couple[] $couple_array */
        $couple_array = [];
        $couple_array = $this->sortPeople($couple_array);

        $not_exists_any_couple = count($couple_array) < 1;

        if ($not_exists_any_couple) {
            return new Couple();
        }

        return $this->getCoupleResult($couple_array);
    }

    /**
     * @param $couple_array
     * @return array
     */
    private function sortPeople($couple_array): array
    {
        $number_of_people = count($this->people);

        for ($i = 0; $i < $number_of_people; $i++)
        {
            for ($j = $i + 1; $j < $number_of_people; $j++)
            {
                $couple_array[] = $this->getCoupleByAge($i, $j);
            }
        }

        return $couple_array;
    }

    /**
     * @param $couple_array
     * @return mixed
     */
    private function getCoupleResult($couple_array)
    {
        $answer = $couple_array[0];

        foreach ($couple_array as $couple_candidate) {

            $answer = $this->getCoupleByCoupleType($couple_candidate, $answer);
        }
        return $answer;
    }

    /**
     * @param $i
     * @param $j
     * @return Couple
     */
    private function getCoupleByAge($i, $j): Couple
    {
        $couple = new Couple();

        if ($this->people[$i]->birthDate < $this->people[$j]->birthDate) {
            $couple->person_1 = $this->people[$i];
            $couple->person_2 = $this->people[$j];
        } else {
            $couple->person_1 = $this->people[$j];
            $couple->person_2 = $this->people[$i];
        }

        $couple->age_difference = $couple->person_2->birthDate->getTimestamp() - $couple->person_1->birthDate->getTimestamp();
        return $couple;
    }

    /**
     * @param $couple_candidate
     * @param $answer
     * @return mixed
     */
    private function getCoupleByCoupleType($couple_candidate, $answer)
    {
        switch ($this->couple_type)
        {
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
        return $answer;
    }
}
