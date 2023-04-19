<?php

namespace App\Http\Controllers\Player;

use App\Http\Controllers\Controller;
use App\Domains\Player\Services\DeletePlayer;
use Illuminate\Http\Response;

class DeletePlayerController extends Controller
{
    private DeletePlayer $deletePlayerService;

    public function __construct(DeletePlayer $deletePlayerService)
    {
        $this->deletePlayerService = $deletePlayerService;
    }

    public function index(int $id)
    {
        $response = $this->deletePlayerService->handle($id);
        return response()->json([
            'data' => $response,
        ], Response::HTTP_OK);
    }
}
