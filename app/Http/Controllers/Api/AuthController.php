<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest as AuthLoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        if ($user->type == 'admin')
            $token = $user->createToken('auth_token', ['admin'])->plainTextToken;
        else
            $token = $user->createToken('auth_token', ['user'])->plainTextToken;

        return response()->json([
            'message' => 'You are now logged',
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        // $user = Auth::user();
        // $user->tokens()->delete();
        // auth()->user()->token()->delete();
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'You logged out'
        ]);
    }
}
