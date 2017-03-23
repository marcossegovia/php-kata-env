<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

class Couple
{
    /** @var Person */
    public $younger;

    /** @var Person */
    public $older;

    /** @var int */
    public $birthday_distance_in_seconds;

    public function __construct(Person $first_person, Person $second_person)
    {
        if ($first_person->birthDate() < $second_person->birthDate()) {
            $this->younger = $first_person;
            $this->older   = $second_person;
        } else {
            $this->younger = $second_person;
            $this->older   = $first_person;
        }

        $this->birthday_distance_in_seconds =
            $this->older->birthDate()->getTimestamp() - $this->younger->birthDate()->getTimestamp();
    }

    /**
     * @return Person
     */
    public function younger()
    {
        return $this->younger;
    }

    /**
     * @return Person
     */
    public function older()
    {
        return $this->older;
    }

    /**
     * @return int
     */
    public function birthdayDistanceInSeconds()
    {
        return $this->birthday_distance_in_seconds;
    }
}
