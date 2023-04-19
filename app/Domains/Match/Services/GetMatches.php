<?php

namespace App\Domains\Match\Services;

use App\Domains\Match\MatchRepository;
use Carbon\Carbon;

class GetMatches
{
    private MatchRepository $repository;

    public function __construct(MatchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(array $filters)
    {
        $query = $this->repository->newQuery();
        if (isset($filters['date'])) {
            $query->where('date', Carbon::make($filters['date']));
        }
        if (isset($filters['order'])) {
            $query->orderBy('id', $filters['order']);
        }
        return $query->with('teams')->get();
    }
}
