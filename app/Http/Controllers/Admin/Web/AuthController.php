<?php

namespace App\Http\Controllers\Admin\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(AuthRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            toast('Вы успешно авторизовались','success');
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->withErrors('Неверные учетные данные.');
        }
    }
}
