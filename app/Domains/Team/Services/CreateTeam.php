<?php

namespace App\Domains\Team\Services;

use App\Domains\Team\Team;
use App\Domains\Team\TeamRepository;

class CreateTeam
{
    private TeamRepository $repository;

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(array $requestTeam)
    {
        $team = new Team();
        $team->count_players = 0;
        $team->name = $requestTeam['name'];
        $this->repository->save($team);

        return $team;
    }
}
