<?php

namespace App\Http\Controllers\Auth;

use App\Domains\User\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * @group Auth endpoints
 */
class RegisterController extends Controller
{
    /**
     * Create a new user
     * 
     * @authenticated
     * 
     * @response status=201 scenario="Success" {
     *     "status": "success",
     *     "message": "User created successfully",
     *     "user": {
     *         "name": "jack3",
     *         "email": "jack3@email.com",
     *         "updated_at": "2021-04-12T10:58:49.000000Z",
     *         "created_at": "2021-04-12T10:58:49.000000Z",
     *         "id": 3
     *     }
     * }
     * 
     * @response status=422 scenario="Unprocessable" {
     *     "message": "The given data was invalid.",
     *     "errors": {
     *         "email": [
     *           "The email field is required."
     *         ],
     *         "name": [
     *           "The name field is required."
     *         ],
     *         "password": [
     *           "The password field is required."
     *         ]
     *     }
     * }
     */
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:255',
            'password' => 'required|min:6|max:22'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'User created successfully',
            'user' => $user
        ], Response::HTTP_CREATED);
    }
}
