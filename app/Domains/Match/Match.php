<?php

namespace App\Domains\Match;

use App\Domains\TeamMatch\TeamMatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Match extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function teams()
    {
        return $this->hasMany(TeamMatch::class);
    }
}
