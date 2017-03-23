<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class Couple
{
    /** @var Person */
    public $younger;

    /** @var Person */
    public $older;

    /** @var int */
    public $birthday_distance_in_seconds;
}
