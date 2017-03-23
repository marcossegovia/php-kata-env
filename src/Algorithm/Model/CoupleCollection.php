<?php

namespace Kata\Algorithm\Model;

final class CoupleCollection implements \Iterator, \Countable, \ArrayAccess
{
    /** @var Couple[] */
    private $all_items;

    /**
     * @param Couple[] $couples_array
     */
    private function __construct(array $couples_array)
    {
        $this->all_items = $couples_array;
    }

    /**
     * @param Person[] $people_array
     *
     * @return CoupleCollection
     */
    public static function buildAllPossibleCouplesFromPeopleArray(array $people_array): CoupleCollection
    {
        $couples = [];

        foreach ($people_array as $first_person) {
            foreach ($people_array as $second_person) {
                if (!$first_person->equals($second_person)) {
                    $couples[] = new Couple($first_person, $second_person);
                }
            }
        }

        return new self($couples);
    }

    public function allItems()
    {
        return $this->all_items;
    }

    public function offsetExists($offset)
    {
        return isset($this->all_items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->all_items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return $this->all_items[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->all_items[$offset]);
    }

    public function count()
    {
        return count($this->all_items);
    }


    public function current()
    {
        return current($this->all_items);
    }

    public function next()
    {
        next($this->all_items);
    }

    public function key()
    {
        return key($this->all_items);
    }

    public function valid()
    {
        return current($this->all_items);
    }

    public function rewind()
    {
        reset($this->all_items);
    }
}
