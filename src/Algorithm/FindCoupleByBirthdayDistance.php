<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

use Kata\Algorithm\Model\Couple;
use Kata\Algorithm\Model\CoupleCollection;
use Kata\Algorithm\Model\CoupleEmpty;
use Kata\Algorithm\Model\Person;

final class FindCoupleByBirthdayDistance
{
    /** @var Person[] */
    private $people;

    /** @var CoupleCollection */
    private $couples;

    /** @var BirthdayDistanceCriteria */
    private $birthday_distance_criteria;

    public function __construct(array $people)
    {
        $this->people  = $people;
        $this->couples = CoupleCollection::buildAllPossibleCouplesFromPeopleArray($people);
    }

    public function findByBirthdaysDistance(int $find_criteria): Couple
    {
        if (0 == count($this->couples)) {
            return new CoupleEmpty();
        }

        $this->birthday_distance_criteria = BirthdayDistanceCriteria::fromCriteriaParameter($find_criteria);

        return $this->getBestMatchCouple();
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
