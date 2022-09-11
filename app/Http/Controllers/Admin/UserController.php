<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserResource;

class UserController extends Controller
{

    public function index()
    {
        return view('dashboard.user.index')
            ->with(['users' =>  User::all()]);
    }

    public function create()
    {
        return view('dashboard.user.create');
    }

    public function store(UserRequest $request)
    {
        User::create($request->validated());

        alert()->success('Успешно!','Сотрудник успешно добавлен!');

        return redirect()->route('users.index');

    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @param  \App\Models\AdvertiserContact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit')->withUser($user);
    }

    public function update(UserRequest $request, User $user)
    {
        $user->update($request->validated());

        alert()->success('Успешно!','Сотрудник успешно обновлен!');

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        alert()->success('Успешно!','Сотрудник успешно удален!');

        return back();
    }
}
