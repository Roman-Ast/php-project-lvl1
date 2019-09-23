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
 * This function to check for parity
 *
 * @param integer $num - is integer that need to check
 *
 * @return $num;
 */
function isEven($num)
{
    return $num % 2 === 0 ? 'yes' : 'no';
}
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
    $random = rand(0, 100);
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
