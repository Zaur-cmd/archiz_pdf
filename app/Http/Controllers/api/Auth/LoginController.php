<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\AuthResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  Request  $request
     * @return AuthResource|\Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)){
            return response(['message' => 'Неверный email или пароль'], 401);
        }

        if(Auth::user()->tokens()){
            Auth::user()->tokens()->delete();;
        }

       $token = auth()->user()->createToken($request->email)->plainTextToken;
       $user = auth()->user();

        return new AuthResource($user, $token);
    }
}
