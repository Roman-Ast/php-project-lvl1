<?php

/**
 * CLI function to greeting users
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
 * This function start the game
 *
 * @return $name
 */
function run()
{
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
