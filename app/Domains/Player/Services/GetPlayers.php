<?php

namespace App\Domains\Player\Services;

use App\Domains\Player\Player;
use App\Domains\Player\PlayerRepository;

class GetPlayers
{
    private PlayerRepository $repository;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(array $filters)
    {
        $query = $this->repository->newQuery();
        if (isset($filters['name'])) {
            $query->where('name', 'like', "%{$filters['name']}%");
        }
        if (isset($filters['document'])) {
            $query->where('document', $filters['document']);
        }
        if (isset($filters['number'])) {
            $query->where('number', $filters['number']);
        }
        if (isset($filters['order'])) {
            $query->orderBy('id', $filters['order']);
        }
        return $query->get();
    }
}
