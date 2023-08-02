<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiscussionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'login');
    Route::post('auth/register', 'register');
    Route::get('auth/logout', 'logout');
    Route::get('auth/refresh', 'refresh');
    Route::get('auth/profile', 'profile');
});

Route::resource('discussion', DiscussionController::class);
