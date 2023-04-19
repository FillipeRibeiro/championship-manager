<?php

namespace App\Domains\Player\Services;

use App\Domains\Player\Player;
use App\Domains\Player\PlayerRepository;
use App\Domains\Team\TeamRepository;
use Exception;

class CreatePlayer
{
    private PlayerRepository $repository;
    private TeamRepository $teamRepository;

    public function __construct(
        PlayerRepository $repository,
        TeamRepository $teamRepository
    ) {
        $this->repository = $repository;
        $this->teamRepository = $teamRepository;
    }

    public function handle(array $requestPlayer)
    {
        $team = $this->teamRepository->getById($requestPlayer['team_id']);
        if ($team->count_players == 5) {
            throw new Exception("Player can't be signed to team {$team->name}");
        }
        $team->count_players += 1;
        $this->teamRepository->save($team);

        $player = new Player();
        $player->name = $requestPlayer['name'];
        $player->document = $requestPlayer['document'];
        $player->number = $requestPlayer['number'];
        $player->team_id = $requestPlayer['team_id'];
        $this->repository->save($player);

        return $player;
    }
}
