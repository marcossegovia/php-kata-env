<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class PeopleComparison
{
    /** @var Person */
    private $young_person;

    /** @var Person */
    private $old_person;

    /** @var int */
    private $birthday_difference;

    public function youngPerson()
    {
        return $this->young_person;
    }

    public function oldPerson()
    {
        return $this->old_person;
    }

    public function birthdayDifference()
    {
        return $this->birthday_difference;
    }

    public function setYoungPerson(Person $a_person)
    {
        $this->young_person = $a_person;
    }

    public function setOldPerson(Person $a_person)
    {
        $this->old_person = $a_person;
    }

    public function setBirthdayDifference(int $a_birthday_difference)
    {
        $this->birthday_difference = $a_birthday_difference;
    }
}
