<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function findGcd($n, $m)
{
    if ($m > 0) {
        return findGcd($m, $n % $m);
    } else {
        return abs($n);
    }
}

function hasGcd($num1, $num2)
{
    $result = findGcd($num1, $num2);
    return is_int($result) && $result > 1;
}

function gameGcd($user, $round = 1)
{
    $random1 = rand(0, 100);
    $random2 = rand(0, 100);

    if (!hasGcd($random1, $random2)) {
        return gameGcd($user, $round);
    }

    line("Question: {$random1} {$random2}");
    $userAnswer = prompt('Your answer?');

    $gcd = findGcd($random1, $random2);

    if ((int)$userAnswer === $gcd) {
        line("Correct!");
        if ($round >= 3) {
            line("Congratulations, {$user}!");
            return;
        }
        gameGcd($user, $round += 1);
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$gcd}'");
        line("Let's try again, {$user}!");
        return;
    }
}