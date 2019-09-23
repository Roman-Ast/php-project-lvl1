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
 * @param integer $n - is the first number
 * @param integer $m - is the second number
 *
 * @return gcd;
 */
function findGcd($n, $m)
{
    if ($m > 0) {
        return findGcd($m, $n % $m);
    } else {
        return abs($n);
    }
}

/**
 * This function is to check does two numbers have common GCD
 *
 * @param integer $n - is the first number
 * @param integer $m - is the second number
 *
 * @return gcd;
 */
function hasGcd($n, $m)
{
    $result = findGcd($n, $m);
    return is_int($result) && $result > 1;
}

/**
 * This function is to create two numbers that have common GCD
 *
 * @return array of two numbers;
 */
function makeTwoNumbersWithCommonGcd()
{
    $random1 = rand(1, 100);
    $random2 = rand(1, 100);

    if (!hasGcd($random1, $random2)) {
        return makeTwoNumbersWithCommonGcd();
    }

    return [$random1, $random2];
}

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

    $gcd = findGcd($random1, $random2);

    if ((int)$userAnswer === $gcd) {
        line("Correct!");
        if ($round >= 3) {
            line("Congratulations, {$user}!");
            return;
        }
        gcd($user, $round += 1);
    } else {
        line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$gcd}'");
        line("Let's try again, {$user}!");
        return;
    }
}
