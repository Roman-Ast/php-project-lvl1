<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\play;

const DESCRIPTION_PRIME = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i < sqrt($num); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function runPrime()
{
    $createGameData = function () {
        $question = rand(1, 100);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    play($createGameData, DESCRIPTION_PRIME);
}
