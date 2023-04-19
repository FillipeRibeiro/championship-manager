<?php

namespace App\Domains\Team\Services;

use App\Domains\Team\TeamRepository;

class UpdateTeam
{
    private TeamRepository $repository;

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(int $id, array $requestTeam)
    {
        /** App\Domains\Team\Team $team */
        $team = $this->repository->newQuery()->findOrFail($id);
        $team->name = $requestTeam['name'] ?? $team->name;
        $this->repository->update($team);

        return $team;
    }
}
