<?php

namespace App\Domains\Player;

use App\Core\Repository;
use App\Domains\Player\Player;

class PlayerRepository extends Repository
{
    public function getModel(): string
    {
        return Player::class;
    }
}
