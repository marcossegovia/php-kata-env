<?php

namespace Kata\Lonja\Domain\Model;

final class Destination
{
    private $city;
    private $kilometers;

    public function __construct(string $a_city, int $a_kilometers)
    {
        $this->city       = $a_city;
        $this->kilometers = $a_kilometers;
    }

    public function city()
    {
        return $this->city;
    }

    public function kilometers()
    {
        return $this->kilometers;
    }
}
