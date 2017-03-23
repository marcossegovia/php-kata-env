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
        $this->birthday_difference = $this->old_person->birthDate()->getTimestamp()
            - $this->youngPerson()->birthDate()->getTimestamp();

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
}
