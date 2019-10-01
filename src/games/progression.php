<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\play;

const DESCRIPTION_PROGRESSION = "What number is missing in the progression?";
const PROGRESSION_LENGTH = 10;
const PROGRESSION_STEP = 10;

function buildProgression(int $progressionStart, int $progressionStep, int $progressionLength)
{
    $progression = [];
    for ($i = 0; $i < $progressionLength; $i += 1) {
        $progression[] = $progressionStart + $progressionStep * $i;
    }
    return $progression;
}

function progression()
{
    $createGameData = function () {
        $progressionStart = rand(1, 10);
        $progressionStep = rand(1, 10);
        $hiddenElementIndex = rand(0, PROGRESSION_LENGTH - 1);
        $progression = buildProgression($progressionStart, $progressionStep, PROGRESSION_LENGTH);

        $correctAnswer = array_splice($progression, $hiddenElementIndex, 1, '..')[0];
        $question = implode(' ', $progression);

        return [$question, $correctAnswer];
    };

    play($createGameData, DESCRIPTION_PROGRESSION);
}
