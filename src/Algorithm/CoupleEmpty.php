<?php

declare(strict_types = 1);

namespace Kata\Algorithm;

final class CoupleEmpty extends Couple
{
    public function __construct()
    {
    }

    public function younger()
    {
        return null;
    }

    public function older()
    {
        return null;
    }

    public function birthdayDistanceInSeconds()
    {
        return null;
    }
}
