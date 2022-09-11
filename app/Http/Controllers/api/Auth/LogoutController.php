<?php

namespace App\Http\Controllers\Api\Auth;


use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /**
     * Logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        auth()->user()->tokens()->delete();

        return response(['message' => 'Logout was successful!'], 200);
    }
}
