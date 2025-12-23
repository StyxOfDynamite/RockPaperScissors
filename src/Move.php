<?php

declare(strict_types=1);

namespace StyxOfDynamite\RockPaperScissors;

abstract class Move
{
    abstract public function name(): string;
}
