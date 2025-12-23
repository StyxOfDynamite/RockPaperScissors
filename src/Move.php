<?php

declare(strict_types=1);

namespace StyxOfDynamite\RockPaperScissors;

abstract class Move implements Beats
{
    abstract public function name(): string;

    #[\Override]
    abstract public function beats(Move $other): bool;

    /**
     * Compares this move against another.
     *
     * @return int 1 if this move wins, -1 if it loses, 0 on tie/unknown
     */
    public function compare(Move $other): int
    {
        return $this->beats($other) ? 1 : ($other->beats($this) ? -1 : 0);
    }
}
