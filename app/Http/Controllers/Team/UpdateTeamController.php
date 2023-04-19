<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Domains\Team\Services\UpdateTeam;
use App\Domains\Team\Validators\UpdateTeamValidator as Request;
use Illuminate\Http\Response;

class UpdateTeamController extends Controller
{
    private UpdateTeam $updateTeamService;

    public function __construct(UpdateTeam $updateTeamService)
    {
        $this->updateTeamService = $updateTeamService;
    }

    public function index(Request $request, int $id)
    {
        $validatedData = $request->validated();
        $response = $this->updateTeamService->handle($id, $validatedData);
        return response()->json([
            'message' => "Team updated successfully",
            'data' => $response,
        ], Response::HTTP_CREATED);
    }
}
