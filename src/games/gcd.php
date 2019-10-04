<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\play;

const DESCRIPTION_GCD = "Find the greatest common divisor of given numbers.";

function makeTwoNumbersWithCommonGcd()
{
    $first = rand(1, 100);
    $second = rand(1, 100);

    if (!hasGcd($first, $second)) {
        return makeTwoNumbersWithCommonGcd();
    }

    return [$first, $second];
}

function hasGcd(int $n, int $m)
{
    $result = findGcd($n, $m);
    return is_int($result) && $result > 1;
}

function findGcd(int $n, int $m)
{
    return $m > 0 ? findGcd($m, $n % $m) : abs($n);
}

function runGcd()
{
    $createGameData = function () {
        [$first, $second] = makeTwoNumbersWithCommonGcd();

        $correctAnswer = findGcd($first, $second);
        $question = "{$first} {$second}";

        return [$question, $correctAnswer];
    };

    play($createGameData, DESCRIPTION_GCD);
}
