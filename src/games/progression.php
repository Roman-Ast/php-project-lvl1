<?php

/**
 * This function implements logic of game 'progression'
 *
 * PHP version 7.2
 *
 * @category PHP
 * @package  Php-project-lvl1
 * @author   Popadinets Roman <roman_planeta@mail.ru>
 * @license  https://github.com/Roman-Ast/php-project-lvl1 MIT
 * @link     https://github.com/Roman-Ast/php-project-lvl1
 */

namespace BrainGames\Cli\games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\games\helpers\buildProgression;

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
