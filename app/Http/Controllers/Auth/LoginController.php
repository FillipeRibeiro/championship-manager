<?php

namespace App\Http\Controllers\Auth;

use App\Domains\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

/**
 * @group Auth endpoints
 */
class LoginController extends Controller
{
    /**
     * Generate a token for a valid user
     * 
     * @response 200 {
     *     {
     *       "access_token": "7|m93dUxd4MZuFI1KdcSfldT1qgCnrEaaHt1VejDMS"
     *     }
     * }
     * 
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|max:25',
            'password' => 'required|min:6|max:22'
        ], $request->all());

        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials.',
            ], Response::HTTP_UNAUTHORIZED);
        }
        $user->tokens()->delete();
        $authToken = $user->createToken("{$user->id}-auth-token")->plainTextToken;

        return response()->json([
            'access_token' => $authToken
        ]);
    }
}
