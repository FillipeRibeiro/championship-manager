<?php

namespace App\Domains\Player\Services;

use App\Exceptions\NotFoundException;
use App\Exceptions\InternalServerErrorException;
use App\Domains\Player\PlayerRepository;
use Illuminate\Http\Response;

class DeletePlayer
{
    private PlayerRepository $repository;

    public function __construct(PlayerRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(int $id)
    {
        $player = $this->repository->newQuery()->find($id);
        if (empty($player)) {
            throw new NotFoundException("Player not found", Response::HTTP_NOT_FOUND);
        }
        try {
            $this->repository->delete($player);
        } catch (InternalServerErrorException $e) {
            throw new InternalServerErrorException($e->getMessage(), $e->getCode);
        }
        return "Player deleted successfuly";
    }
}
