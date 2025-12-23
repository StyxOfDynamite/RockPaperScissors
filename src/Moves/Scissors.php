<?php

declare(strict_types=1);

namespace StyxOfDynamite\RockPaperScissors\Moves;

use StyxOfDynamite\RockPaperScissors\Move;

class Scissors extends Move
{
    #[\Override]
    public function name(): string
    {
        return 'Scissors';
    }

    #[\Override]
    public function beats(Move $other): bool
    {
        return $other instanceof Paper;
    }
}
