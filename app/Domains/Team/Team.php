<?php

namespace App\Domains\Team;

use App\Domains\Player\Player;
use App\Domains\Rating\Rating;
use App\Domains\TeamMatch\TeamMatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function player()
    {
        return $this->hasMany(Player::class);
    }

    public function rating()
    {
        return $this->hasMany(Rating::class);
    }

    public function matches()
    {
        return $this->hasMany(TeamMatch::class);
    }
}
