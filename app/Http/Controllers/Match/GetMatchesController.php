<?php

namespace App\Http\Controllers\Match;

use App\Http\Controllers\Controller;
use App\Domains\Match\Services\GetMatches;
use App\Domains\Match\Validators\GetMatchesValidator as Request;
use Illuminate\Http\Response;

class GetMatchesController extends Controller
{
    private GetMatches $getMatchesService;

    public function __construct(GetMatches $getMatchesService)
    {
        $this->getMatchesService = $getMatchesService;
    }

    public function index(Request $request)
    {
        $validatedData = $request->validated();
        $response = $this->getMatchesService->handle($validatedData);
        return response()->json([
            'data' => $response
        ], Response::HTTP_OK);
    }
}
