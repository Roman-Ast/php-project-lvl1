<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\playTheGame;

const GAME_LOGIC_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num)
{
    for ($i = 2; $i < sqrt($num); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function prime()
{
    $gamePrime = function () {
        $questionNumber = rand(1, 100);
        $correct = isPrime($questionNumber) === true ? 'yes' : 'no';

        return [ $questionNumber, $correct ];
    };

    playTheGame($gamePrime, GAME_LOGIC_PRIME);
}
