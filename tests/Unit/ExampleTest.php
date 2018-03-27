<?php

namespace Kata;

use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /** @test */
    public function exampleShouldReturnJellytime()
    {
        $this->assertEquals('JellyTime', (new Example())->greetings());
    }
}
