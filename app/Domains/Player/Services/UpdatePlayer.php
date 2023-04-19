<?php

namespace App\Domains\Player\Services;

use App\Domains\Player\PlayerRepository;
use Exception;

class UpdatePlayer
{
    private PlayerRepository $repository;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(int $id, array $requestPlayer)
    {
        /** App\Domains\Player\Player $player */
        $player = $this->repository->newQuery()->findOrFail($id);
        $player->name = $requestPlayer['name'] ?? $player->name;
        $player->number = $requestPlayer['number'] ?? $player->number;
        $this->repository->update($player);

        return $player;
    }
}
