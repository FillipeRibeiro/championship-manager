<?php

namespace App\Domains\Player;

use App\Domains\Team\Team;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
