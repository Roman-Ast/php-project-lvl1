<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

const ROUNDS_MAX_QUANTITY = 3;

function play(callable $gameData, string $gameDescription)
{
    line("Welcome to the Brain Games!");
    line("{$gameDescription}\n");

    $user = prompt("May I have your name?");
    line("Hello, {$user}!\n");

    for ($round = 0; $round < ROUNDS_MAX_QUANTITY; $round++) {
        [$question, $correctAnswer] = $gameData();

        $userAnswer = prompt("Question {$question}");

        if ($userAnswer != $correctAnswer) {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'");
            line("Let's try again, {$user}!");
            return;
        }

        line("Correct!");
    }

    line("Congratulations, ${user}!");
}
