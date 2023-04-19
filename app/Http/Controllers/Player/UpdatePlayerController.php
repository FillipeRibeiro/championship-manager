<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Domains\Player\Services\UpdatePlayer;
use App\Domains\Player\Validators\UpdatePlayerValidator as Request;
use Illuminate\Http\Response;

class UpdatePlayerController extends Controller
{
    private UpdatePlayer $updatePlayerService;

    public function __construct(UpdatePlayer $updatePlayerService)
    {
        $this->updatePlayerService = $updatePlayerService;
    }

    public function index(Request $request, int $id)
    {
        $validatedData = $request->validated();
        $response = $this->updatePlayerService->handle($id, $validatedData);
        return response()->json([
            'message' => "Player updated successfully",
            'data' => $response,
        ], Response::HTTP_CREATED);
    }
}
