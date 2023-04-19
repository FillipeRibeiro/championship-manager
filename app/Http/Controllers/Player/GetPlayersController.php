<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Domains\Player\Services\GetPlayers;
use App\Domains\Player\Validators\GetPlayersValidator as Request;
use Illuminate\Http\Response;

class GetPlayersController extends Controller
{
    private GetPlayers $getPlayersService;

    public function __construct(GetPlayers $getPlayersService)
    {
        $this->getPlayersService = $getPlayersService;
    }

    public function index(Request $request)
    {
        $validatedData = $request->validated();
        $response = $this->getPlayersService->handle($validatedData);
        return response()->json([
            'data' => $response
        ], Response::HTTP_OK);
    }
}
