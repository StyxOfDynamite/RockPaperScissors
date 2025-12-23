<?php

declare(strict_types=1);

use StyxOfDynamite\RockPaperScissors\Moves\Paper;
use StyxOfDynamite\RockPaperScissors\Moves\Rock;
use StyxOfDynamite\RockPaperScissors\Moves\Scissors;

test('move names', function (): void {
    expect((new Rock())->name())->toBe('Rock');
    expect((new Paper())->name())->toBe('Paper');
    expect((new Scissors())->name())->toBe('Scissors');
});

test('beats relationships', function (): void {
    $rock = new Rock();
    $paper = new Paper();
    $scissors = new Scissors();

    expect($rock->beats($scissors))->toBeTrue();
    expect($paper->beats($rock))->toBeTrue();
    expect($scissors->beats($paper))->toBeTrue();

    expect($rock->beats($paper))->toBeFalse();
    expect($paper->beats($scissors))->toBeFalse();
    expect($scissors->beats($rock))->toBeFalse();
});

test('compare outcomes', function (): void {
    $rock = new Rock();
    $paper = new Paper();
    $scissors = new Scissors();

    expect($rock->compare($scissors))->toBe(1);
    expect($paper->compare($rock))->toBe(1);
    expect($scissors->compare($paper))->toBe(1);

    expect($scissors->compare($rock))->toBe(-1);
    expect($rock->compare($paper))->toBe(-1);
    expect($paper->compare($scissors))->toBe(-1);

    expect($rock->compare(new Rock()))->toBe(0);
    expect($paper->compare(new Paper()))->toBe(0);
    expect($scissors->compare(new Scissors()))->toBe(0);
});

