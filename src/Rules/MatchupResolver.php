<?php

declare(strict_types=1);

namespace StyxOfDynamite\RockPaperScissors\Rules;

use StyxOfDynamite\RockPaperScissors\Move;

final readonly class MatchupResolver
{
    public function __construct(private RuleSet $rules)
    {
    }

    /**
     * @return int 1 if first wins, -1 if second wins, 0 on tie/unknown
     */
    public function resolve(Move $first, Move $second): int
    {
        return $this->rules->beats($first, $second)
            ? 1
            : ($this->rules->beats($second, $first) ? -1 : 0);
    }
}
