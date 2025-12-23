<?php

declare(strict_types=1);

namespace StyxOfDynamite\RockPaperScissors\Rules;

use StyxOfDynamite\RockPaperScissors\Move;
use StyxOfDynamite\RockPaperScissors\Moves\Paper;
use StyxOfDynamite\RockPaperScissors\Moves\Rock;
use StyxOfDynamite\RockPaperScissors\Moves\Scissors;

final class RuleSet
{
    /**
     * @param array<class-string<Move>, array<class-string<Move>, bool>> $rules
     */
    public function __construct(private array $rules = [])
    {
    }

    /**
     * @param array<class-string<Move>, array<class-string<Move>>> $beatsMap
     */
    public static function fromBeatsMap(array $beatsMap): self
    {
        $rules = [];

        foreach ($beatsMap as $winner => $losers) {
            foreach ($losers as $loser) {
                $rules[$winner][$loser] = true;
            }
        }

        return new self($rules);
    }

    public static function standard(): self
    {
        return self::fromBeatsMap([
            Rock::class => [Scissors::class],
            Paper::class => [Rock::class],
            Scissors::class => [Paper::class],
        ]);
    }

    /**
     * @param class-string<Move> $winner
     * @param class-string<Move> $loser
     */
    public function withRule(string $winner, string $loser): self
    {
        /** @var array<class-string<Move>, array<class-string<Move>, bool>> $rules */
        $rules = $this->rules;
        $rules[$winner][$loser] = true;

        return new self($rules);
    }

    public function beats(Move $winner, Move $loser): bool
    {
        return isset($this->rules[$winner::class][$loser::class]);
    }
}
