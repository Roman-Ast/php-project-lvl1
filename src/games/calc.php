<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\play;

const DESCRIPTION_CALC = 'What is the result of the expression?';

function calc()
{
    $createGameData = function () {
        $operations = [
            '+' => function ($num1, $num2) {
                return $num1 + $num2;
            },
            '-' => function ($num1, $num2) {
                return $num1 - $num2;
            },
            '*' => function ($num1, $num2) {
                return $num1 * $num2;
            }
        ];

        $first = rand(1, 100);
        $second = rand(1, 100);
        $operation = array_rand($operations, 1);

        $correctAnswer = $operations[$operation]($first, $second);
        $question = "{$first} {$operation} {$second}";

        return [$question, $correctAnswer];
    };
    
    play($createGameData, DESCRIPTION_CALC);
}
