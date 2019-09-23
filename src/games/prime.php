<?php

namespace BrainGames\Cli\games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\games\helpers\randomNumber;
use function BrainGames\Cli\games\helpers\isPrime;

/**
 * This function is to interract with users
 *
 * @param string  $user  - is name of user, recieved from STDIN
 * @param integer $round - is count of rounds completed by user
 *
 * @return game or void;
 */
function prime($user, $round = 1)
{
    $random = randomNumber(1, 500);
    line("Question: {$random}");
    $userAnswer = prompt('Your answer?');

    $correct = isPrime($random);

    if ($userAnswer === $correctAnswer) {
        line("Correct!");
        if ($round >= 3) {
            line("Congratulations, {$user}!");
            return;
        }
        prime($user, $round += 1);
    } else {
        line(
            "'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correct}'"
        );
        line("Let's try again, {$user}!");
        return;
    }
}
