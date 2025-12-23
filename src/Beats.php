<?php

declare(strict_types=1);

namespace StyxOfDynamite\RockPaperScissors;

interface Beats
{
    public function beats(Move $other): bool;
}
