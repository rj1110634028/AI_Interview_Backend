<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscussionController;
use App\Http\Middleware\AuthUser;
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

Route::middleware(AuthUser::class)->group(function () {
    Route::resource('discussion', DiscussionController::class);
});
Route::controller(DiscussionController::class)->group(function () {
    Route::get('discussion', 'index');
    Route::get('discussion/{discussion}', 'show');
});

Route::controller(CommentController::class)->group(function () {
    Route::middleware(AuthUser::class)->group(function () {
        Route::post('{type}/{id}/comment', 'store');
        Route::put('comment/{comment}', 'update');
        Route::patch('comment/{comment}', 'update');
        Route::delete('comment/{comment}', 'destroy');
    });
    Route::get('{type}/{id}/comment', 'index');
});
