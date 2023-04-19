<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Domains\Team\Services\CreateTeam;
use App\Domains\Team\Validators\CreateTeamValidator as Request;
use Illuminate\Http\Response;

class CreateTeamController extends Controller
{
    private CreateTeam $createTeamService;

    public function __construct(CreateTeam $createTeamService)
    {
        $this->createTeamService = $createTeamService;
    }

    public function index(Request $request)
    {
        $validatedData = $request->validated();
        $response = $this->createTeamService->handle($validatedData);
        return response()->json([
            'message' => "Team created successfully",
            'data' => $response,
        ], Response::HTTP_CREATED);
    }
}
