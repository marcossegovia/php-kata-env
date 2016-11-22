<?php

namespace Kata\BowlingKata\Domain;

final class RollCollection implements \Iterator, \ArrayAccess
{
    private $roll_array;

    public function __construct(array $a_roll_content_array)
    {
        $roll_array = [];
        foreach ($a_roll_content_array as $key => $roll_content) {
            $roll = Roll::fromMark($roll_content);

            if ($roll->type()->isSpare()) {
                $roll->increaseScore(Frame::MAX_FRAME_SCORE - Roll::fromMark($a_roll_content_array[$key - 1])->score());
            }

            $roll_array[] = $roll;
        }

        $this->roll_array = $roll_array;
    }

    public function current()
    {
        return current($this->roll_array);
    }

    public function next()
    {
        return next($this->roll_array);
    }

    public function key()
    {
        return key($this->roll_array);
    }

    public function valid()
    {
        return current($this->roll_array);
    }

    public function rewind()
    {
        return reset($this->roll_array);
    }

    public function offsetExists($offset)
    {
        return isset($this->roll_array[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->roll_array[$offset];
    }

    public function offsetSet($offset, $value)
    {
        return $this->roll_array[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->roll_array[$offset]);
    }
}
