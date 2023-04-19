<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use App\Domains\Rating\Services\GetRating;
use App\Domains\Rating\Validators\GetRatingValidator as Request;
use Illuminate\Http\Response;

class RatingController extends Controller
{
    private GetRating $getRatingService;

    public function __construct(GetRating $getRatingService)
    {
        $this->getRatingService = $getRatingService;
    }

    public function index(Request $request)
    {
        $validatedData = $request->validated();
        $response = $this->getRatingService->handle($validatedData);
        return response()->json([
            'data' => $response
        ], Response::HTTP_OK);
    }
}
