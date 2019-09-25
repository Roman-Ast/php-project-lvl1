<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\playTheGame;

const GAME_LOGIC_CALC = 'What is the result of the expression?';

function calc()
{
    $gameCalc = function () {
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

        $randomFirst = rand(1, 100);
        $randomSecond = rand(1, 100);

        $operation = array_rand($operations, 1);

        $correct = $operations[$operation]($randomFirst, $randomSecond);
        return ["{$randomFirst} {$operation} {$randomSecond}", $correct];
    };
    
    playTheGame($gameCalc, GAME_LOGIC_CALC);
}
