<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Requests\UserRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class RegisterController extends Controller
{
    /**
     * Create a new user instance after a valid registration
     *
     * @param  Request  $request
     * @return AuthResource
     */
    public function __invoke(UserRequest $request)
    {
        $image = null;

        if ($request->image) {

            $request->validate(['image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            $image = $request->file('image')->store('uploads');
        }
        $user = User::create($request->validated() + ['image' => $image ]);


        if($request->role_id)
            $user->attachRole($request->role_id);


        $token = $user->createToken($request->email)->plainTextToken;

        return new AuthResource($user, $token);
    }
}
