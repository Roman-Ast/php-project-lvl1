<?php

namespace BrainGames\Cli;
use function cli\line;
use function cli\prompt;

function run($gameLogic = null)
{
    line("Welcome to the Brain Games!");
    line("{$gameLogic}\n");
    $name = prompt("May I have your name?");
    line("Hello, {$name}!\n");
    
    return $name;
}
