<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\play;

const DESCRIPTION_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num)
{
    return $num % 2 === 0;
}

function runEven()
{
    $createGameData = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    play($createGameData, DESCRIPTION_EVEN);
}
