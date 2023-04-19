<?php

namespace App\Domains\Match\Services;

use App\Exceptions\NotFoundException;
use App\Exceptions\InternalServerErrorException;
use App\Domains\Match\MatchRepository;
use Illuminate\Http\Response;

class DeleteMatch
{
    private MatchRepository $repository;

    public function __construct(MatchRepository $repository)
    {
        $this->repository = $repository;
    }

    public function handle(int $id)
    {
        $match = $this->repository->newQuery()->find($id);
        if (empty($match)) {
            throw new NotFoundException("Match not found", Response::HTTP_NOT_FOUND);
        }
        try {
            $this->repository->delete($match);
        } catch (InternalServerErrorException $e) {
            throw new InternalServerErrorException($e->getMessage(), $e->getCode);
        }
        return "Match deleted successfuly";
    }
}
