<?php

namespace App\Domains\Match\Services;

use App\Domains\Match\Match;
use App\Domains\Match\MatchRepository;
use App\Domains\TeamMatch\TeamMatch;
use App\Domains\TeamMatch\TeamMatchRepository;
use App\Exceptions\InternalServerErrorException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CreateMatch
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

    public function handle(array $requestMatch)
    {
        try {
            DB::beginTransaction();

            $match = new Match();
            $match->date = Carbon::make($requestMatch['date']);
            $match->end_time = Carbon::make($requestMatch['end_time']);
            $match->begin_time = Carbon::make($requestMatch['begin_time']);
            $this->repository->save($match);

            $teamA = new TeamMatch();
            $teamA->match_id = $match->id;
            $teamA->team_id = $requestMatch['team_id_A'];
            $teamA->goals = $requestMatch['goals_team_id_A'];
            $teamA->red_cards = $requestMatch['red_card_team_id_A'];
            $teamA->yellow_cards = $requestMatch['yellow_card_team_id_A'];
            $this->teamMatchrepository->save($teamA);

            $teamB = new TeamMatch();
            $teamB->match_id = $match->id;
            $teamB->team_id = $requestMatch['team_id_B'];
            $teamB->goals = $requestMatch['goals_team_id_B'];
            $teamB->red_cards = $requestMatch['red_card_team_id_B'];
            $teamB->yellow_cards = $requestMatch['yellow_card_team_id_B'];
            $this->teamMatchrepository->save($teamB);

        } catch (InternalServerErrorException $e) {
            DB::rollBack();
            Throw new InternalServerErrorException($e->getMessage(), $e->getCode());
        }

        DB::commit();
        return $match;
    }
}
