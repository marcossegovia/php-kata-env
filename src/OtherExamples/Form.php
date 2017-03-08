<?php

namespace Kata\OtherExamples;

class Form
{
    private $x;

    /**
     * Form constructor.
     *
     * @param $x
     */
    public function __construct($x)
    {
        $this->x = $x;
    }

    function getX()
    {
        //returns closure bound to this object and scope
        return function ()
        {
            return $this->x;
        };
    }

}