<?php

namespace Kata\PHP7Kata;

use Kata\OtherExamples\
{
    Form, Example, NotAnExample
};

final class LegacyToMigrate
{
    public const ANIMALS = [
        'dog',
        'cat',
        'bird'
    ];

    public function getStringOrNull(?string $param): ?string
    {
        return $param;
    }

    public function sumOfIntegers(int ...$ints)
    {
        return array_sum($ints);
    }

    public function arraysSum(...$arrays): array
    {
        return array_map(
            function (array $array): int
            {
                return array_sum($array);
            },
            $arrays
        );
    }

    public function getUserName($user): string
    {
        return $user['username'] ?? 'nobody';
    }

    public function strcmpFromC($a, $b)
    {
<<<<<<< Updated upstream
        if ($a == $b)
        {
            return 0;
        }
        elseif ($a > $b)
        {
            return 1;
        }
        else
        {
            return -1;
        }
=======
        return $a <=> $b;
>>>>>>> Stashed changes
    }

    public function saySomething()
    {
        $example        = new Example();
        $not_an_example = new NotAnExample();

        return $example->greetings() . ' ' . $not_an_example->greetings() . '!';
    }

    public function divideEnters($a, $b)
    {
        return intdiv($a, $b);
    }

    public function searchInText()
    {
        $credit_card = 'daniel:madurell:visa:999888777';

        $credit_card = preg_replace_callback_array(
            [
                '/([a-z]{1})/' => function ($match)
                {
                    return strtoupper($match[1]);
                },
                '/([0-9]{1})/' => function ($match)
                {
                    return 'XXX';
                }
            ],
            $credit_card
        );

        return $credit_card;
    }

    public function callingClosures()
    {
        $getX = function ()
        {
            return $this->x;
        };

        return $getX->call(new Form(2));
    }

    public function nothingToReturn(&$left, &$right): void
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
        [$id, $name] = $data[$number_user];

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
        catch (FirstException | SecondException $e)
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
        return $a_string[-1];
    }

    public function printForEachValue()
    {
        $gen = (function ()
        {
            yield 1;
        })();

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
