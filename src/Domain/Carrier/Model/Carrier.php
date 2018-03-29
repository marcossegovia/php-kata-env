<?php

declare(strict_types=1);

namespace Kata\Domain\Carrier\Model;

use Kata\Domain\Carrier\ValueObject\CarrierId;
use Kata\Domain\Common\ValueObject\AggregateRoot;

class Carrier extends AggregateRoot
{
    /** @var string  */
    private $name;

    public function __construct(CarrierId $carrierId, string $name)
    {
        parent::__construct($carrierId);
        $this->name = $name;
    }

    public static function instance(CarrierId $carrierId, string $name): Carrier
    {
        return new self($carrierId, $name);
    }
}