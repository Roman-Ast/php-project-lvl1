<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\run;

function playTheGame(callable $gameData, string $gameLogic, int $round = 1, string $user = '')
{
    $user = $user === '' ? run($gameLogic) : $user;

    [ $question, $correctAnswer ] = $gameData();
    $userAnswer = prompt("Question {$question}");

    if ((int)$userAnswer !== (int)$correctAnswer) {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
        line("Let's try again, {$user}!");
        return;
    }
    line("Correct!");
    while ($round < 3) {
        return playTheGame($gameData, $gameLogic, $round += 1, $user);
    }
    line("Congratulations, {$user}!");
    return;
}
