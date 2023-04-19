<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Domains\Team\Services\GetTeams;
use App\Domains\Team\Validators\GetTeamsValidator as Request;
use Illuminate\Http\Response;

class GetTeamsController extends Controller
{
    private GetTeams $getTeamsService;

    public function __construct(GetTeams $getTeamsService)
    {
        $this->getTeamsService = $getTeamsService;
    }

    public function index(Request $request)
    {
        $validatedData = $request->validated();
        $response = $this->getTeamsService->handle($validatedData);
        return response()->json([
            'data' => $response
        ], Response::HTTP_OK);
    }
}
