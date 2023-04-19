<?php

namespace App\Http\Controllers\Match;

use App\Http\Controllers\Controller;
use App\Domains\Match\Services\DeleteMatch;
use Illuminate\Http\Response;

class DeleteMatchController extends Controller
{
    private DeleteMatch $deletedMatchService;

    public function __construct(DeleteMatch $deletedMatchService)
    {
        $this->deletedMatchService = $deletedMatchService;
    }

    public function index(int $id)
    {
        $response = $this->deletedMatchService->handle($id);
        return response()->json([
            'data' => $response,
        ], Response::HTTP_OK);
    }
}
