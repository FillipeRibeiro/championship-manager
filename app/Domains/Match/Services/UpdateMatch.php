<?php

namespace App\Domains\Match\Services;

use App\Domains\Match\MatchRepository;
use App\Domains\TeamMatch\TeamMatchRepository;
use App\Exceptions\NotFoundException;
use App\Exceptions\InternalServerErrorException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class UpdateMatch
{
    private MatchRepository $repository;
    private TeamMatchRepository $teamMatchRepository;

    public function __construct(
        MatchRepository $repository,
        TeamMatchRepository $teamMatchRepository
    ) {
        $this->repository = $repository;
        $this->teamMatchrepository = $teamMatchRepository;
    }

    public function handle(int $id, array $requestMatch)
    {
        try {
            DB::beginTransaction();

            $match = $this->repository->getById('id', $id);
            if (empty($match)) {
                throw new NotFoundException("Match not found");
            }
            $match->date = Carbon::make($requestMatch['date']) ?? $match->date;
            $match->end_time = Carbon::make($requestMatch['end_time']) ?? $match->end_time;
            $match->begin_time = Carbon::make($requestMatch['begin_time']) ?? $match->begin_time;
            $this->repository->save($match);

            $teamMatch = $this->teamMatchrepository->newQQuery()
                ->where('match_id', $id)
                ->where('team_id', $requestMatch['team_id'])
                ->first();
            if (empty($teamMatch)) {
                throw new NotFoundException("Match with team provided not found");
            }
            $teamMatch->goals = $requestMatch['goals'] ?? $teamMatch->goals;
            $teamMatch->red_cards = $requestMatch['red_cards'] ?? $teamMatch->red_cards;
            $teamMatch->yellow_cards = $requestMatch['yellow_cards'] ?? $teamMatch->yellow_cards;
            $this->teamMatchrepository->save($teamMatch);
        } catch (InternalServerErrorException $e) {
            DB::rollBack();
            throw new InternalServerErrorException($e->getMessage(), $e->getCode());
        }

        DB::commit();
        return $match->with('teams');
    }
}
