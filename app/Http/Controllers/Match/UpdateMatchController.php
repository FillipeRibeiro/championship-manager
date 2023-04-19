<?php

namespace App\Http\Controllers\Match;

use App\Http\Controllers\Controller;
use App\Domains\Match\Services\UpdateMatch;
use App\Domains\Match\Validators\UpdateMatchValidator as Request;
use Illuminate\Http\Response;

class UpdateMatchController extends Controller
{
    private UpdateMatch $updateMatchService;

    public function __construct(UpdateMatch $updateMatchService)
    {
        $this->updateMatchService = $updateMatchService;
    }

    public function index(Request $request, int $id)
    {
        $validatedData = $request->validated();
        $response = $this->updateMatchService->handle($id, $validatedData);
        return response()->json([
            'message' => "Match updated successfully",
            'data' => $response,
        ], Response::HTTP_CREATED);
    }
}
