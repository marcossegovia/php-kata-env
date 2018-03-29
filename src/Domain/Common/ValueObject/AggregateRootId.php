<?php

declare(strict_types=1);

namespace Kata\Domain\Common\ValueObject;

use Ramsey\Uuid\Uuid;

abstract class AggregateRootId
{
    /** @var string */
    protected $uuid;

    public function __construct(string $id = null)
    {
        $this->uuid = $id ?: Uuid::uuid4()->toString();
    }

    public static function instance(): AggregateRootId
    {
        return new static();
    }

    public static function instanceFromId(string $id): AggregateRootId
    {
        return new static($id);
    }

    public function __toString(): string
    {
        return (string) $this->uuid;
    }
}
