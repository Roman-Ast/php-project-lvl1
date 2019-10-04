<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\play;

const DESCRIPTION_PROGRESSION = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;

function buildProgression(int $start, int $step, int $length)
{
    $progression = [];
    for ($i = 0; $i < $length; $i += 1) {
        $progression[] = $start + $step * $i;
    }
    return $progression;
}

function runProgression()
{
    $createGameData = function () {
        $start = rand(1, PROGRESSION_LENGTH);
        $step = rand(1, 10);
        $hiddenElementIndex = rand(0, PROGRESSION_LENGTH - 1);
        $progression = buildProgression($start, $step, PROGRESSION_LENGTH);

        $correctAnswer = array_splice($progression, $hiddenElementIndex, 1, '..')[0];
        $question = implode(' ', $progression);

        return [$question, $correctAnswer];
    };

    play($createGameData, DESCRIPTION_PROGRESSION);
}
