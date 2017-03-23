<?php

declare(strict_types = 1);

namespace KataTest\Unit\Algorithm;

use Kata\Algorithm\BirthdayDistanceCriteria;
use Kata\Algorithm\FindCoupleByBirthdayDistance;
use Kata\Algorithm\Model\Person;
use PHPUnit\Framework\TestCase;

final class FindCoupleByBirthdayDistanceTest extends TestCase
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
        $this->sue   = new Person("Sue", new \DateTime("1950-01-01"));
        $this->greg  = new Person("Greg", new \DateTime("1952-05-01"));
        $this->sarah = new Person("Sarah", new \DateTime("1982-01-01"));
        $this->mike  = new Person("Mike", new \DateTime("1979-01-01"));
    }

    /** @test */
    public function should_return_empty_when_given_empty_list()
    {
        $list   = [];
        $finder = new FindCoupleByBirthdayDistance($list);

        $couple = $finder->findByBirthdaysDistance(BirthdayDistanceCriteria::CLOSEST_BIRTHDAY);

        $this->assertEquals(null, $couple->younger());
        $this->assertEquals(null, $couple->older());
    }

    /** @test */
    public function should_return_empty_when_given_one_person()
    {
        $list   = [$this->sue];
        $finder = new FindCoupleByBirthdayDistance($list);

        $couple = $finder->findByBirthdaysDistance(BirthdayDistanceCriteria::CLOSEST_BIRTHDAY);

        $this->assertEquals(null, $couple->younger());
        $this->assertEquals(null, $couple->older());
    }

    /** @test */
    public function should_return_closest_two_for_two_people()
    {
        $list   = [$this->sue, $this->greg];
        $finder = new FindCoupleByBirthdayDistance($list);

        $couple = $finder->findByBirthdaysDistance(BirthdayDistanceCriteria::CLOSEST_BIRTHDAY);

        $this->assertEquals($this->sue, $couple->younger());
        $this->assertEquals($this->greg, $couple->older());
    }

    /** @test */
    public function should_return_furthest_two_for_two_people()
    {
        $list   = [$this->mike, $this->greg];
        $finder = new FindCoupleByBirthdayDistance($list);

        $couple = $finder->findByBirthdaysDistance(BirthdayDistanceCriteria::FURTHEST_BIRTHDAY);

        $this->assertEquals($this->greg, $couple->younger());
        $this->assertEquals($this->mike, $couple->older());
    }

    /** @test */
    public function should_return_furthest_two_for_four_people()
    {
        $list   = [$this->sue, $this->sarah, $this->mike, $this->greg];
        $finder = new FindCoupleByBirthdayDistance($list);

        $couple = $finder->findByBirthdaysDistance(BirthdayDistanceCriteria::FURTHEST_BIRTHDAY);

        $this->assertEquals($this->sue, $couple->younger());
        $this->assertEquals($this->sarah, $couple->older());
    }

    /**
     * @test
     */
    public function should_return_closest_two_for_four_people()
    {
        $list   = [$this->sue, $this->sarah, $this->mike, $this->greg];
        $finder = new FindCoupleByBirthdayDistance($list);

        $couple = $finder->findByBirthdaysDistance(BirthdayDistanceCriteria::CLOSEST_BIRTHDAY);

        $this->assertEquals($this->sue, $couple->younger());
        $this->assertEquals($this->greg, $couple->older());
    }
}
