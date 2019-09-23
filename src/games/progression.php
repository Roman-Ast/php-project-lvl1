<?php

/**
 * CLI function to play game with users
 *
 * PHP version 7.2
 *
 * @category PHP
 * @package  Php-project-lvl1
 * @author   Popadinets Roman <roman_planeta@mail.ru>
 * @license  https://github.com/Roman-Ast/php-project-lvl1 MIT
 * @link     https://github.com/Roman-Ast/php-project-lvl1
 */

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

/**
 * This function is to find GCD of two numbers
 *
 * @param integer $constant - is constant step
 *
 * @return array $progression;
 */
function buildProgression($constant)
{
    $first = rand(0, 10);
    $progression[0] = $first;
    for ($i = 1; $i < 10; $i++) {
        $progression[$i] = $progression[$i - 1] + $constant;
    }
    return $progression;
}

/**
 * This function is to interract with users
 *
 * @param string  $user  - is name of user, recieved from STDIN
 * @param integer $round - is count of rounds completed by user
 *
 * @return game or void;
 */
function progression($user, $round = 1)
{
    $randomIndex = rand(0, 9);
    $rawProgression = buildProgression(rand(1, 10));
    $hiddenElement = array_splice($rawProgression, $randomIndex, 1, '..');
    $strForOutput = implode(' ', $rawProgression);
    
    line("Question: {$strForOutput}");
    $userAnswer = prompt('Your answer?');

    if ((int)$userAnswer === $hiddenElement[0]) {
        line("Correct!");
        if ($round >= 3) {
            line("Congratulations, {$user}!");
            return;
        }
        progression($user, $round += 1);
    } else {
        line(
            "'{$userAnswer}' is wrong answer ;(. 
            Correct answer was '{$hiddenElement[0]}'"
        );
        line("Let's try again, {$user}!");
        return;
    }
}
