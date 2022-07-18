<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\OnlyGuestM;
use App\Http\Middleware\OnlyMemberM;
use Illuminate\Support\Facades\Route;

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

Route::get('', [HomeController::class, 'home']);

Route::view('/template', 'template');

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login')->middleware(OnlyGuestM::class);
    Route::post('/login', 'doLogin')->middleware(OnlyGuestM::class);
    Route::post('/logout', 'doLogout')->middleware(OnlyMemberM::class);
});
