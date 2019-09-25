<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\playTheGame;

const GAME_LOGIC_PROGRESSION = "What number is missing in the progression?";

function buildProgression(int $constant)
{
    $first = rand(0, 10);
    $progression[0] = $first;
    for ($i = 1; $i < 10; $i++) {
        $progression[$i] = $progression[$i - 1] + $constant;
    }
    return $progression;
}

function progression()
{
    $gameProgression = function () {
        $randomIndex = rand(0, 9);
        $progression = buildProgression(rand(1, 10));
        $hiddenElement = array_splice($progression, $randomIndex, 1, '..');
        $strForOutput = implode(' ', $progression);

        return [ $strForOutput, $hiddenElement[0] ];
    };

    playTheGame($gameProgression, GAME_LOGIC_PROGRESSION);
}
