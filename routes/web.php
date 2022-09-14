<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Web\AuthController;
use App\Http\Controllers\Admin\{UserController as AdminUserController, VisitorController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login.form');


Route::get('/logout', function () {
    Auth::logout();
    return view('auth.login');
})->name('logout');


Route::post('login', AuthController::class)->name('admin.login');
Route::get('show/{id}', [VisitorController::class,'show'])->name('visitor.file');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('download-pdf/{id}', [VisitorController::class,'downloadPdf'])->name('visitor.download');

    Route::resources([
        'users'                 => AdminUserController::class,
        'visitor'               => \App\Http\Controllers\Admin\VisitorController::class,
    ]);
});

