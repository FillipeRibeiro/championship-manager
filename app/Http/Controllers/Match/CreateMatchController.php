<?php

namespace App\Http\Controllers\Match;

use App\Http\Controllers\Controller;
use App\Domains\Match\Services\CreateMatch;
use App\Domains\Match\Validators\CreateMatchValidator as Request;
use Illuminate\Http\Response;

class CreateMatchController extends Controller
{
    private CreateMatch $createMatchService;

    public function __construct(CreateMatch $createMatchService)
    {
        $this->createMatchService = $createMatchService;
    }

    public function index(Request $request)
    {
        $validatedData = $request->validated();
        $response = $this->createMatchService->handle($validatedData);
        return response()->json([
            'message' => "Match created successfully",
            'data' => $response,
        ], Response::HTTP_CREATED);
    }
}
