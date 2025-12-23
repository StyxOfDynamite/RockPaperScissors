<?php

declare(strict_types=1);

use StyxOfDynamite\RockPaperScissors\Moves\Paper;
use StyxOfDynamite\RockPaperScissors\Moves\Rock;
use StyxOfDynamite\RockPaperScissors\Moves\Scissors;
use StyxOfDynamite\RockPaperScissors\Rules\MatchupResolver;
use StyxOfDynamite\RockPaperScissors\Rules\RuleSet;

test('move names', function (): void {
    expect((new Rock())->name())->toBe('Rock');
    expect((new Paper())->name())->toBe('Paper');
    expect((new Scissors())->name())->toBe('Scissors');
});

test('beats relationships', function (): void {
    $ruleSet = RuleSet::standard();

    $rock = new Rock();
    $paper = new Paper();
    $scissors = new Scissors();

    expect($ruleSet->beats($rock, $scissors))->toBeTrue();
    expect($ruleSet->beats($paper, $rock))->toBeTrue();
    expect($ruleSet->beats($scissors, $paper))->toBeTrue();

    expect($ruleSet->beats($rock, $paper))->toBeFalse();
    expect($ruleSet->beats($paper, $scissors))->toBeFalse();
    expect($ruleSet->beats($scissors, $rock))->toBeFalse();
});

test('compare outcomes', function (): void {
    $resolver = new MatchupResolver(RuleSet::standard());

    $rock = new Rock();
    $paper = new Paper();
    $scissors = new Scissors();

    expect($resolver->resolve($rock, $scissors))->toBe(1);
    expect($resolver->resolve($paper, $rock))->toBe(1);
    expect($resolver->resolve($scissors, $paper))->toBe(1);

    expect($resolver->resolve($scissors, $rock))->toBe(-1);
    expect($resolver->resolve($rock, $paper))->toBe(-1);
    expect($resolver->resolve($paper, $scissors))->toBe(-1);

    expect($resolver->resolve(new Rock(), new Rock()))->toBe(0);
    expect($resolver->resolve(new Paper(), new Paper()))->toBe(0);
    expect($resolver->resolve(new Scissors(), new Scissors()))->toBe(0);
});

