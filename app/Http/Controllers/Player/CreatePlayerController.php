<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Domains\Player\Services\CreatePlayer;
use App\Domains\Player\Validators\CreatePlayerValidator as Request;
use Illuminate\Http\Response;

class CreatePlayerController extends Controller
{
    private CreatePlayer $createPlayerService;

    public function __construct(CreatePlayer $createPlayerService)
    {
        $this->createPlayerService = $createPlayerService;
    }

    public function index(Request $request)
    {
        $validatedData = $request->validated();
        $response = $this->createPlayerService->handle($validatedData);
        return response()->json([
            'message' => "Player created successfully",
            'data' => $response,
        ], Response::HTTP_CREATED);
    }
}
