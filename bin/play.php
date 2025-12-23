#!/usr/bin/env php
<?php

declare(strict_types=1);

use StyxOfDynamite\RockPaperScissors\Move;
use StyxOfDynamite\RockPaperScissors\Moves\Paper;
use StyxOfDynamite\RockPaperScissors\Moves\Rock;
use StyxOfDynamite\RockPaperScissors\Moves\Scissors;

require \dirname(__DIR__) . '/vendor/autoload.php';

$registry = [
    'rock' => Rock::class,
    'paper' => Paper::class,
    'scissors' => Scissors::class,
];

if ($argc < 3) {
    fwrite(STDERR, "Usage: php bin/play.php <move1> <move2>\n");
    fwrite(STDERR, "Choices: rock, paper, scissors\n");

    exit(1);
}

[$moveOneName, $moveTwoName] = [$argv[1], $argv[2]];

$moveOne = createMove($moveOneName, $registry);
$moveTwo = createMove($moveTwoName, $registry);

$result = $moveOne->compare($moveTwo);

if ($result === 0) {
    printf("%s vs %s => tie\n", $moveOne->name(), $moveTwo->name());
    exit(0);
}

$winner = $result > 0 ? $moveOne : $moveTwo;
$loser = $result > 0 ? $moveTwo : $moveOne;

printf(
    "%s beats %s => %s wins\n",
    $winner->name(),
    $loser->name(),
    $winner->name()
);

/**
 * @param array<string, class-string<Move>> $registry
 */
function createMove(string $name, array $registry): Move
{
    $key = strtolower($name);

    if (!isset($registry[$key])) {
        fwrite(STDERR, sprintf("Unknown move \"%s\". Valid: %s\n", $name, implode(', ', array_keys($registry))));
        exit(1);
    }

    $class = $registry[$key];

    return new $class();
}

