<?php

declare(strict_types = 1);

namespace Kata\Algorithm\Model;

use DateTime;

final class Person
{
    /** @var string */
    private $name;

    /** @var DateTime */
    private $birth_date;

    public function __construct($a_name, DateTime $a_birth_date)
    {
        $this->name = $a_name;
        $this->birth_date = $a_birth_date;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function birthDate(): DateTime
    {
        return $this->birth_date;
    }

    public function equals(Person $other_person)
    {
        return $this->name === $other_person->name
            && $this->birth_date->getTimestamp() === $other_person->birth_date->getTimestamp();
    }
}
