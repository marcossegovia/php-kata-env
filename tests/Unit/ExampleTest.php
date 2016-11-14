<?php

namespace KataTest\Unit;

use Kata\Example;
use PHPUnit_Framework_TestCase;

class ExampleTest extends PHPUnit_Framework_TestCase
{
    /** @var Example */
    private $example;

    /** @test */
    public function shouldExpectAJellyTimeWhenGreeting()
    {
        $this->havingAnExample();
        $this->thenOnGreetingsShouldAssert("JellyTime");
    }

    public function havingAnExample()
    {
        return $this->example = new Example();
    }

    private function thenOnGreetingsShouldAssert($expected)
    {
        $this->assertEquals($expected, $this->example->greetings());
    }
}
