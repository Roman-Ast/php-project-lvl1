<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\playTheGame;

const GAME_LOGIC_EVEN = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $num)
{
    return $num % 2 === 0 ? true : false;
}

function even()
{
    $gameEven = function () {
        $questionNumber = rand(1, 100);
        $correct = isEven($questionNumber) === true ? 'yes' : 'no';

        return [ $questionNumber, $correct ];
    };

    playTheGame($gameEven, GAME_LOGIC_EVEN);
}
