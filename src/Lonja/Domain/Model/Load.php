<?php

namespace Kata\Lonja\Domain\Model;

final class Load
{
    /** @var LoadLine[] */
    private $lines;

    public function __construct(array $load_lines = [])
    {
        $this->lines = $load_lines;
    }

    /** @return LoadLine[] */
    public function lines(): array
    {
        return $this->lines;
    }
}