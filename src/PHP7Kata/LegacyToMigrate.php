<?php

namespace Kata\PHP7Kata;

use Kata\OtherExamples\Form;
use Kata\OtherExamples\Example;
use Kata\OtherExamples\NotAnExample;

final class LegacyToMigrate
{
    const ANIMALS = [
        'dog',
        'cat',
        'bird'
    ];

    public function getStringOrNull($param)
    {
        return $param;
    }

    public function sumOfIntegers(...$ints)
    {
        // let's review that all items are integers!
        $result = array_map(
            function ($value)
            {
                return (int) $value;
            },
            $ints
        );

        return array_sum($result);
    }

    public function arraysSum(...$arrays)
    {
        return array_map(
            function (array $array)
            {
                return ($array);
            },
            $arrays
        );
    }

    public function getUserName($user): string
    {
        return isset($user['username']) ? $user['username'] : 'nobody';
    }

    public function strcmpFromC($a, $b)
    {
        if ($a == $b)
        {
            return 0;
        }
        elseif ($a > $b)
        {
            return -1;
        }
        else
        {
            return 1;
        }
    }

    public function saySomething()
    {
        $example        = new Example();
        $not_an_example = new NotAnExample();

        return $example->greetings() . ' ' . $not_an_example->greetings() . '!';
    }

    public function divideEnters($a, $b)
    {
        if (0 === $b)
        {
            throw new DivisionByZeroError();
        }

        if ($a === PHP_INT_MIN && -1 === $b)
        {
            throw new ArithmeticError();
        }

        return round($a / $b, 0);
    }

    public function searchInText()
    {
        $credit_card = 'daniel:madurell:visa:999888777';

        $credit_card = preg_replace_callback(
            '/([a-z]{1})/',
            function ($m)
            {
                return strtoupper($m[1]);
            },
            $credit_card
        );

        $credit_card = preg_replace_callback(
            '/([0-9]{1})/',
            function ($m)
            {
                return 'XXX';
            },
            $credit_card
        );

        return $credit_card;
    }

    public function callingClosures()
    {
        $form  = new Form(1);
        $form2 = new Form(2);

        $getX = $form->getX();
        $getX = $getX->bindTo($form2);

        return $getX();
    }

    public function nothingToReturn(&$left, &$right)
    {
        if ($left === $right)
        {
            return;
        }

        $tmp   = $left;
        $left  = $right;
        $right = $tmp;

        return;
    }

    public function getComposedName($data, $number_user)
    {
        list($id, $name) = $data[$number_user];

        return $id . '_' . $name;
    }

    public function getAllComposedNames($data)
    {
        $all_composed_names = '';

        foreach ($data as list($id, $name))
        {
            $all_composed_names .= $id . '_' . $name . '|';
        }

        return $all_composed_names;
    }

    public function tooMuchExceptionsMakeUglyCode()
    {
        try
        {
            $this->functionThatFails();
        }
        catch (FirstException $e)
        {
            return false;
        }

        try
        {
            $this->anotherFunctionThatAlsoFails();
        }
        catch (SecondException $e)
        {
            return false;
        }

        return true;
    }

    private function functionThatFails()
    {
        throw new FirstException;
    }

    private function anotherFunctionThatAlsoFails()
    {
        throw new SecondException;
    }

    public function getLastCharOfAString($a_string)
    {
        return substr($a_string, -1);
    }

    public function printForEachValue()
    {
        //Yield me!
        $gen = range(1, 1);

        foreach ($gen as $key => $value)
        {
            $this->doSomethingTooHeavy($key, $value);
        }

        return $value;
    }

    private function doSomethingTooHeavy($key, $value)
    {
        //...
    }
}
