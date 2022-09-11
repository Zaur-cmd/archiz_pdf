<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    /**
     * Create a new user instance after a valid registration
     *
     * @param  Request  $request
     * @return
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword , $hashedPassword )) {

            if (!Hash::check($request->newpassword , $hashedPassword)) {

                $users = User::find(Auth::user()->id);
                $users->password = $request->newpassword;
                User::where( 'id' , Auth::user()->id)->update( array( 'password' =>  $users->password));

                return response()->json([
                    'message' => 'password updated successfully',
                ], 200);
            }

            else{
                return response()->json([
                    'message' => 'new password can not be the old password!',
                ], 401);
            }

        }

        else{
            return response()->json([
                'message' => 'old password doesnt matched ',
            ], 402);
        }

    }
}
