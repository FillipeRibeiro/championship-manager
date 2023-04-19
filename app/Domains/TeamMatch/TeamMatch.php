<?php

namespace App\Domains\TeamMatch;

use App\Domains\Team\Team;
use App\Domains\Match\Match;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMatch extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function matches()
    {
        return $this->belongsTo(Match::class);
    }

    public function teams()
    {
        return $this->belongsTo(Team::class);
    }
}
