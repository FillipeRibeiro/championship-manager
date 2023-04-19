<?php

namespace App\Domains\Team\Services;

use App\Domains\Team\TeamRepository;

class GetTeams
{
    private TeamRepository $repository;

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(array $filters)
    {
        $query = $this->repository->newQuery();
        if (isset($filters['name'])) {
            $query->where('name', 'LIKE', "%{$filters['name']}%");
        }
        if (isset($filters['order'])) {
            $query->orderBy('id', $filters['order']);
        }
        return $query->get();
    }
}
