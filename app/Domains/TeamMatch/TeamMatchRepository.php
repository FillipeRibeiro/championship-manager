<?php

namespace App\Domains\TeamMatch;

use App\Core\Repository;
use App\Domains\TeamMatch\TeamMatch;

class TeamMatchRepository extends Repository
{
    public function getModel(): string
    {
        return TeamMatch::class;
    }
}
