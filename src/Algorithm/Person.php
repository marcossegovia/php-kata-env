<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

use DateTime;

final class Person
{
    /** @var string */
    public $name;

    /** @var DateTime */
    public $birthDate;

    public function name(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function birthDate(): DateTime
    {
        return $this->birthDate;
    }

    public function setBirthDate(DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
    }
}
