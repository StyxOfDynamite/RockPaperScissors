<?php

declare(strict_types=1);

namespace StyxOfDynamite\RockPaperScissors\Moves;

use StyxOfDynamite\RockPaperScissors\Move;

class Paper extends Move
{
    #[\Override]
    public function name(): string
    {
        return 'Paper';
    }
}
