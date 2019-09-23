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
 * This function is to check num is it prime or not
 *
 * @param integer $num - is integer that need to check
 *
 * @return string 'answer';
 */
function isPrime($num)
{
    for ($i = 2; $i < sqrt($num); $i++) {
        if ($num % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}

/**
 * This function is to interract with users
 *
 * @param string  $user  - is name of user, recieved from STDIN
 * @param integer $round - is count of rounds completed by user
 *
 * @return game or void;
 */
function gamePrime($user, $round = 1)
{
    $random = rand(1, 500);
    line("Question: {$random}");
    $userAnswer = prompt('Your answer?');
    $correctAnswer = isPrime($random);

    if ($userAnswer === $correctAnswer) {
        line("Correct!");
        if ($round >= 3) {
            line("Congratulations, {$user}!");
            return;
        }
        gamePrime($user, $round += 1);
    } else {
        line(
            "'{$userAnswer}' is wrong answer ;(. 
            Correct answer was '{$correctAnswer}'"
        );
        line("Let's try again, {$user}!");
        return;
    }
}
