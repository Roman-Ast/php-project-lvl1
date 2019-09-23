<?php

/**
 * Helper functions to implement game logic
 *
 * PHP version 7.2
 *
 * @category PHP
 * @package  Php-project-lvl1
 * @author   Popadinets Roman <roman_planeta@mail.ru>
 * @license  https://github.com/Roman-Ast/php-project-lvl1 MIT
 * @link     https://github.com/Roman-Ast/php-project-lvl1
 */

namespace BrainGames\Cli\games\helpers;

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
 * This function to create random number
 *
 * @param integer $from is the begin of range
 * @param integer $to   is the end of range
 *
 * @return integer random number;
 */
function randomNumber($from, $to)
{
    return rand($from, $to);
}

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
