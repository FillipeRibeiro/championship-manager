<?php

namespace App\Domains\Team;

use App\Core\Repository;
use App\Domains\Team\Team;

class TeamRepository extends Repository
{
    public function getModel(): string
    {
        return Team::class;
    }
}
