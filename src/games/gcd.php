<?php

namespace BrainGames\Cli\games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\games\helpers\makeTwoNumbersWithCommonGcd;
use function BrainGames\Cli\games\helpers\findGcd;

/**
 * This function to interract with users
 *
 * @param string  $user  - is name of user, recieved from STDIN
 * @param integer $round - is count of rounds completed by user
 *
 * @return game or void;
 */
function gcd($user, $round = 1)
{
    [$firstNum, $secondNum] = makeTwoNumbersWithCommonGcd();
    
    line("Question: {$firstNum} {$secondNum}");
    $userAnswer = prompt('Your answer?');

    $correct = findGcd($firstNum, $secondNum);

    if ((int)$userAnswer === $correct) {
        line("Correct!");
        if ($round >= 3) {
            line("Congratulations, {$user}!");
            return;
        }
        gcd($user, $round += 1);
    } else {
        line(
            "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correct}'"
        );
        line("Let's try again, {$user}!");
        return;
    }
}
