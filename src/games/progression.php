<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\play;

const DESCRIPTION_PROGRESSION = "What number is missing in the progression?";
const PROGRESSION_MAX_LENGTH = 10;
const PROGRESSION_MAX_STEP = 10;

function buildProgression(int $constant, int $progressionMaxLength)
{
    $progression = [];
    for ($i = 0; $i < $progressionMaxLength; $i++) {
        $progression[] =  $i + $constant * $i;
    }
    return $progression;
}

function progression()
{
    $createGameData = function () {
        $hiddenElementIndex = rand(0, PROGRESSION_MAX_LENGTH - 1);
        $progressionStep = rand(1, PROGRESSION_MAX_STEP);
        $progression = buildProgression($progressionStep, PROGRESSION_MAX_LENGTH);
        $hiddenElement = array_splice($progression, $hiddenElementIndex, 1, '..')[0];
        $question = implode(' ', $progression);

        return [$question, $hiddenElement];
    };

    play($createGameData, DESCRIPTION_PROGRESSION);
}
