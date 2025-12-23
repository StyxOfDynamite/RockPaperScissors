<?php

declare(strict_types=1);

namespace StyxOfDynamite\RockPaperScissors\Moves;

use StyxOfDynamite\RockPaperScissors\Move;

class Rock extends Move
{
    #[\Override]
    public function name(): string
    {
        return 'Rock';
    }

    #[\Override]
    public function beats(Move $other): bool
    {
        return $other instanceof Scissors;
    }
}
