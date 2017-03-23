<?php

declare(strict_types = 1);

namespace KataTest\Unit\Algorithm;

use Kata\Algorithm\Finder;
use Kata\Algorithm\BirthdaySort;
use Kata\Algorithm\Person;
use PHPUnit\Framework\TestCase;

final class FinderTest extends TestCase
{
    /** @var Person */
    private $sue;

    /** @var Person */
    private $greg;

    /** @var Person */
    private $sarah;

    /** @var Person */
    private $mike;

    protected function setUp()
    {
        $this->sue   = new Person('Sue', new \DateTime("1950-01-01"));
        $this->greg  = new Person('Greg', new \DateTime("1952-05-01"));
        $this->sarah = new Person('Sarah', new \DateTime("1982-01-01"));
        $this->mike  = new Person('Mike', new \DateTime("1979-01-01"));
    }

    /** @test */
    public function should_return_empty_when_given_empty_list()
    {
        $list   = [];
        $finder = new Finder($list);

        $result = $finder->find(BirthdaySort::CLOSEST);

        $this->assertEquals(null, $result->firstPerson());
        $this->assertEquals(null, $result->secondPerson());
    }

    /** @test */
    public function should_return_empty_when_given_one_person()
    {
        $list   = [];
        $list[] = $this->sue;
        $finder = new Finder($list);

        $result = $finder->find(BirthdaySort::CLOSEST);

        $this->assertEquals(null, $result->firstPerson());
        $this->assertEquals(null, $result->secondPerson());
    }

    /** @test */
    public function should_return_closest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->find(BirthdaySort::CLOSEST);

        $this->assertEquals($this->sue, $result->firstPerson());
        $this->assertEquals($this->greg, $result->secondPerson());
    }

    /** @test */
    public function should_return_furthest_two_for_two_people()
    {
        $list   = [];
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->find(BirthdaySort::FURTHEST);

        $this->assertEquals($this->greg, $result->firstPerson());
        $this->assertEquals($this->mike, $result->secondPerson());
    }

    /** @test */
    public function should_return_furthest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->find(BirthdaySort::FURTHEST);

        $this->assertEquals($this->sue, $result->firstPerson());
        $this->assertEquals($this->sarah, $result->secondPerson());
    }

    /**
     * @test
     */
    public function should_return_closest_two_for_four_people()
    {
        $list   = [];
        $list[] = $this->sue;
        $list[] = $this->sarah;
        $list[] = $this->mike;
        $list[] = $this->greg;
        $finder = new Finder($list);

        $result = $finder->find(BirthdaySort::CLOSEST);

        $this->assertEquals($this->sue, $result->firstPerson());
        $this->assertEquals($this->greg, $result->secondPerson());
    }
}
