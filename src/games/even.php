<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\play;

const DESCRIPTION_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num)
{
    return $num % 2 === 0;
}

function even()
{
    $createGameData = function () {
        $question = rand(1, 100);
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    play($createGameData, DESCRIPTION_EVEN);
}
