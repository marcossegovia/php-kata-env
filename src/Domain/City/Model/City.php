<?php

declare(strict_types=1);

namespace Kata\Domain\City\Model;

use Kata\Domain\City\ValueObject\CityId;
use Kata\Domain\Common\ValueObject\AggregateRoot;

class City extends AggregateRoot
{
    /** @var string  */
    private $name;

    public function __construct(CityId $cityId, string $name)
    {
        parent::__construct($cityId);
        $this->name = $name;
    }

    public static function instance(CityId $cityId, string $name): City
    {
        return new self($cityId, $name);
    }

    public function  name(): string
    {
        return $this->name;
    }
}
