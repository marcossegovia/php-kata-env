<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class PeopleComparison
{
    /** @var Person */
    private $first_person;

    /** @var Person */
    private $second_person;

    /** @var int */
    private $birthday_difference;

    public function firstPerson()
    {
        return $this->first_person;
    }

    public function secondPerson()
    {
        return $this->second_person;
    }

    public function birthdayDifference()
    {
        return $this->birthday_difference;
    }

    public function setFirstPerson(Person $a_person)
    {
        $this->first_person = $a_person;
    }

    public function setSecondPerson(Person $a_person)
    {
        $this->second_person = $a_person;
    }

    public function setBirthdayDifference(int $a_birthday_difference)
    {
        $this->birthday_difference = $a_birthday_difference;
    }
}
