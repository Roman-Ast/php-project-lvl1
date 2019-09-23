<?php

namespace BrainGames\Cli\games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\games\helpers\randomNumber;
use function BrainGames\Cli\games\helpers\isEven;

/**
 * This function to interract with users
 *
 * @param string  $user  - is name of user, recieved from STDIN
 * @param integer $round - is count of rounds completed by user
 *
 * @return game or void;
 */
function even($user, $round = 1)
{
    $random = randomNumber(1, 100);
    line("Question: {$random}");
    $userAnswer = prompt('Your answer?');

    $isEven = isEven($random);

    if ($userAnswer === $isEven) {
        line("Correct!");
        if ($round >= 3) {
            line("Congratulations, {$user}!");
            return;
        }
        even($user, $round += 1);
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$isEven}'");
        line("Let's try again, {$user}!");
        return;
    }
}
