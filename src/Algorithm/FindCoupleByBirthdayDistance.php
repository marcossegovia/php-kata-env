<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class FindCoupleByBirthdayDistance
{
    /** @var Person[] */
    private $people;

    /** @var Couple[] */
    private $couples;

    /** @var BirthdayDistanceCriteria */
    private $birthday_distance_criteria;

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

        $this->birthday_distance_criteria = BirthdayDistanceCriteria::fromCriteriaParameter($find_criteria);

        return $this->getBestMatchCouple();
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

    private function getBestMatchCouple(): Couple
    {
        $selected_couple = $this->couples[0];

        foreach ($this->couples as $current_couple) {
            if ($this->birthday_distance_criteria->isSatisfiedBy($current_couple)->versus($selected_couple)) {
                $selected_couple = $current_couple;
            }
        }

        return $selected_couple;
    }
}
