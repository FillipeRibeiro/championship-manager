<?php

namespace App\Domains\Team\Services;

use App\Domains\Team\TeamRepository;
use App\Exceptions\NotFoundException;
use App\Exceptions\InternalServerErrorException;
use Illuminate\Http\Response;

class DeleteTeam
{
    private TeamRepository $repository;

    public function __construct(TeamRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(int $id)
    {
        $team = $this->repository->newQuery()->find($id);
        if (empty($team)) {
            throw new NotFoundException("Team not found", Response::HTTP_NOT_FOUND);
        }
        try {
            $this->repository->delete($team);
        } catch (InternalServerErrorException $e) {
            throw new InternalServerErrorException($e->getMessage(), $e->getCode);
        }
        return "Team deleted successfuly";
    }
}
