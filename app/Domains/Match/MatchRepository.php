<?php

namespace App\Domains\Match;

use App\Core\Repository;
use App\Domains\Match\Match;

class MatchRepository extends Repository
{
    public function getModel(): string
    {
        return Match::class;
    }
}
