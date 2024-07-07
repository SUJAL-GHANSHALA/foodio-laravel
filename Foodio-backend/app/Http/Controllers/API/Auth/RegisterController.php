<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Requests\RegistrationRequest;

class RegisterController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        $validateData = $request->validated();

        $user = User::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'password' => bcrypt($validateData['password']),
        ]);

        $roleId = $validateData['role_id'];
        $user->roles()->attach($roleId);

        $token = JWTAuth::fromUser($user);

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        //ttl = time to live
        $ttl = 7 * 24 * 60 * 60; //for 7 days

        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $ttl,
        ]);
    }
}
