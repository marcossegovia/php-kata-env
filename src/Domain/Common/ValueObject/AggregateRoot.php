<?php

declare(strict_types=1);

namespace Kata\Domain\Common\ValueObject;

abstract class AggregateRoot
{
    /** @var string */
    protected $uuid;

    protected function __construct(AggregateRootId $aggregateRootId)
    {
        $this->uuid = $aggregateRootId;
    }

    public function uuid(): AggregateRootId
    {
        return $this->uuid;
    }

    public function __toString(): string
    {
        return (string) $this->uuid;
    }
}
