<?php

namespace App\Domains\Rating\Services;

use App\Domains\TeamMatch\TeamMatchRepository;

class GetRating
{
    private TeamMatchRepository $repository;

    public function __construct(TeamMatchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(array $filters)
    {
        $query = $this->repository->newQuery()
            ->selectRaw("SUM(red_cards) as total_red_cards")
            ->selectRaw("SUM(yellow_cards) as total_yellow")
            ->selectRaw("(SUM(red_cards)*2) + SUM(yellow_cards) as card_points")
            ->selectRaw("sum(goals) as total_goals")
            ->selectRaw("team_id");

        if (isset($filters['order'])) {
            $query->orderBy('id', $filters['order']);
        }
        if (isset($filters['goals'])) {
            $query->orderBy('total_goals', $filters['goals']);
        }
        if (isset($filters['card_points'])) {
            $query->orderBy('cards_points', $filters['card_points']);
        }
        return $query->groupBy('team_id')
            ->get();
    }
}
