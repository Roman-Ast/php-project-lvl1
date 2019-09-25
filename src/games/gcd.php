<?php

namespace BrainGames\Cli\games;

use function BrainGames\Cli\playTheGame;

const GAME_LOGIC_GCD = "Find the greatest common divisor of given numbers.";

function makeTwoNumbersWithCommonGcd()
{
    $random1 = rand(1, 100);
    $random2 = rand(1, 100);

    if (!hasGcd($random1, $random2)) {
        return makeTwoNumbersWithCommonGcd();
    }

    return [$random1, $random2];
}

function hasGcd(int $n, int $m)
{
    $result = findGcd($n, $m);
    return is_int($result) && $result > 1;
}

function findGcd(int $n, int $m)
{
    if ($m > 0) {
        return findGcd($m, $n % $m);
    } else {
        return abs($n);
    }
}

function GCD()
{
    $gameGCD = function () {
        [$firstNum, $secondNum] = makeTwoNumbersWithCommonGcd();
        $correct = findGcd($firstNum, $secondNum);

        return [ "{$firstNum} {$secondNum}", $correct ];
    };

    playTheGame($gameGCD, GAME_LOGIC_GCD);
}
