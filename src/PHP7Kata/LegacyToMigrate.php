<?php

namespace Kata\PHP7Kata;

use Behat\Testwork\Ordering\Orderer\Orderer;
use Kata\OtherExamples\{
    Example, Form, NotAnExample
};

final class LegacyToMigrate
{
    const ANIMALS = [
        'dog',
        'cat',
        'bird'
    ];

    public function getStringOrNull(?string $param):? string
    {
        return $param;
    }

    public function sumOfIntegers(int ...$ints)
    {
        return array_sum($ints);
    }

    public function arraysSum(array ...$arrays)
    {
        return array_map(function (array $array) {
            return ($array);
        }, $arrays);
    }

    public function getUserName($user): string
    {
        return $user['username'] ?? 'nobody';
    }

    public function strcmpFromC($a, $b)
    {
        return $a <=> $b;
    }

    public function saySomething()
    {
        $example        = new Example();
        $not_an_example = new NotAnExample();

        return $example->greetings() . ' ' . $not_an_example->greetings() . '!';
    }

    public function divideEnters(int $a, int $b)
    {
        return round($a / $b, 0);
    }

    public function searchInText()
    {
        $credit_card = 'daniel:madurell:visa:999888777';

        $credit_card = preg_replace_callback_array([
            '/([a-z]{1})/' => function ($m) {
                return strtoupper($m[1]);
            },
            '/([0-9]{1})/' => function ($m) {
                return 'XXX';
            }

        ], $credit_card);

        return $credit_card;
    }

    public function callingClosures()
    {
        $form  = new Form(1);
        $form2 = new Form(2);

        $getX = $form->getX();

        return $getX->call($form2);
    }

    public function nothingToReturn(&$left, &$right): void
    {
        if ($left === $right) {
            return;
        }

        $tmp   = $left;
        $left  = $right;
        $right = $tmp;

        return;
    }

    public function getComposedName($data, $number_user) : string
    {
        [$id, $name] = $data[$number_user];

        return $id . '_' . $name;
    }

    public function getAllComposedNames($data)
    {
        $all_composed_names = '';

        foreach ($data as [$id, $name]) {
            $all_composed_names .= $id . '_' . $name . '|';
        }

        return $all_composed_names;
    }

    public function tooMuchExceptionsMakeUglyCode()
    {
        try {
            $this->functionThatFails();
            $this->anotherFunctionThatAlsoFails();
        } catch (SecondException | FirstException $e) {
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

    public function getLastCharOfAString(string $a_string): string
    {
        return substr($a_string, -1);
    }

    public function printForEachValue()
    {
        $gen = function () { return yield 1; };

        foreach ($gen() as $key => $value) {
            $this->doSomethingTooHeavy($key, $value);
        }

        return $value;
    }

    private function doSomethingTooHeavy($key, $value)
    {
        //...
    }
}
