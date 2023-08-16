<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ExperienceController;
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
    Route::resource('category', CategoryController::class);
});

Route::middleware(AuthUser::class)->group(function () {
    Route::resource('discussion', DiscussionController::class);
});
Route::controller(DiscussionController::class)->group(function () {
    Route::get('discussion', 'index');
    Route::get('discussion/{discussion}', 'show');
});

Route::middleware(AuthUser::class)->group(function () {
    Route::resource('experience', ExperienceController::class);
});
Route::controller(ExperienceController::class)->group(function () {
    Route::get('experience', 'index');
    Route::get('experience/{experience}', 'show');
});

Route::controller(CommentController::class)->group(function () {
    Route::middleware(AuthUser::class)->group(function () {
        Route::post('discussion/{discussion}/comment', 'store');
        Route::put('comment/{comment}', 'update');
        Route::patch('comment/{comment}', 'update');
        Route::delete('comment/{comment}', 'destroy');
    });
    Route::get('discussion/{discussion}/comment', 'show');
});

