<?php

namespace Kata\BowlingKata;

use Kata\BowlingKata\Domain\Game;

final class PlayBowling
{
    public function __invoke(array $rolls) : int
    {
        $game = new Game($rolls);

        return $game->score();
    }
}
