<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Web\AuthController;
use App\Http\Controllers\Admin\{UserController as AdminUserController,
    CategoryController as AdminCategoryController,
    FavoriteController as AdminFavoriteController,
    RatingController as AdminRatingController,
    OrderStatusController,
    PortfolioController,
    ServiceCategoryController,
    ServiceController,
    SocialMediaController,
    OrderController,
    VisitorController};

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

Route::get('/privacy_navbat', function () {
    return view('privacy_navbat');
});

Route::get('/', function () {
    return view('auth.login');
})->name('login.form');

Route::post('login', AuthController::class)->name('admin.login');
Route::get('show/{id}', [VisitorController::class,'show'])->name('visitor.file');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('download-pdf/{id}', [VisitorController::class,'downloadPdf'])->name('visitor.download');

    Route::resources([
        'users'                 => AdminUserController::class,
        'visitor'               => \App\Http\Controllers\Admin\VisitorController::class,
    ]);
});

