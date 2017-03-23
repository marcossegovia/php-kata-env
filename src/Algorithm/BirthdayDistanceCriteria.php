<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class BirthdayDistanceCriteria
{
    const CLOSEST_BIRTHDAY = 1;
    const FURTHEST_BIRTHDAY = 2;

    /** @var int */
    private $criteria;

    private function __construct(int $criteria)
    {
        $this->criteria = $criteria;
    }

    public static function fromCriteriaParameter(int $criteria): BirthdayDistanceCriteria
    {
        if (!in_array($criteria, [self::CLOSEST_BIRTHDAY, self::FURTHEST_BIRTHDAY])) {
            throw new \InvalidArgumentException('Criteria ' . $criteria . ' is invalid.');
        }

        return new self($criteria);
    }

    public function isSatisfiedBy(Couple $first_couple, Couple $second_couple): bool
    {
        if (self::CLOSEST_BIRTHDAY === $this->criteria) {
            return $first_couple->hasLessDistanceThan($second_couple);
        }

        if (self::FURTHEST_BIRTHDAY === $this->criteria) {
            return $first_couple->hasGreaterDistanceThan($second_couple);
        }
    }
}
