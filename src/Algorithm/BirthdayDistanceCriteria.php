<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class BirthdayDistanceCriteria
{
    const CLOSEST_BIRTHDAY = 1;
    const FURTHEST_BIRTHDAY = 2;

    /** @var int */
    private $criteria;

    /** @var Couple */
    private $first_couple;

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

    public function isSatisfiedBy(Couple $first_couple)
    {
        $this->first_couple = $first_couple;

        return $this;
    }

    public function versus(Couple $second_couple): bool
    {
        if (self::CLOSEST_BIRTHDAY === $this->criteria) {
            return $this->first_couple->hasLessDistanceThan($second_couple);
        }

        if (self::FURTHEST_BIRTHDAY === $this->criteria) {
            return $this->first_couple->hasGreaterDistanceThan($second_couple);
        }
    }
}
