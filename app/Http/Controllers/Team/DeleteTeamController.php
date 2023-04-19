<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Domains\Team\Services\DeleteTeam;
use Illuminate\Http\Response;

class DeleteTeamController extends Controller
{
    private DeleteTeam $deleteTeamService;

    public function __construct(DeleteTeam $deleteTeamService)
    {
        $this->deleteTeamService = $deleteTeamService;
    }

    public function index(int $id)
    {
        $response = $this->deleteTeamService->handle($id);
        return response()->json([
            'data' => $response,
        ], Response::HTTP_OK);
    }
}
