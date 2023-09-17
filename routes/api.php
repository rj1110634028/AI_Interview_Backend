<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\WorkExperienceController;
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

// Auth
Route::controller(AuthController::class)->group(function () {
    Route::post('auth/login', 'login');
    Route::post('auth/register', 'register');
    Route::get('auth/logout', 'logout');
    Route::get('auth/refresh', 'refresh');
    Route::get('auth/profile', 'profile');
    Route::patch('auth/profile', 'update');
    Route::post('auth/reset-password', 'resetPassword');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('category', 'index');
});

// Discussion
Route::controller(DiscussionController::class)->group(function () {
    Route::middleware(AuthUser::class)->group(function () {
        Route::resource('discussion', DiscussionController::class);
        Route::get('auth/discussion', 'ownDiscussion');
    });
    Route::get('discussion', 'index');
    Route::get('discussion/{discussion}', 'show');
});

// Experience
Route::controller(ExperienceController::class)->group(function () {
    Route::middleware(AuthUser::class)->group(function () {
        Route::resource('experience', ExperienceController::class);
        Route::get('auth/experience', 'ownExperience');
    });
    Route::get('experience', 'index');
    Route::get('experience/{experience}', 'show');
});

// Comment
Route::controller(CommentController::class)->group(function () {
    Route::middleware(AuthUser::class)->group(function () {
        Route::post('{type}/{id}/comment', 'store');
        Route::put('comment/{comment}', 'update');
        Route::patch('comment/{comment}', 'update');
        Route::delete('comment/{comment}', 'destroy');
    });
    Route::get('{type}/{id}/comment', 'index');
});

// Favorite
Route::controller(FavoriteController::class)->group(function () {
    Route::middleware(AuthUser::class)->group(function () {
        Route::post('{type}/{id}/favorite', 'store');
        Route::delete('{type}/{id}/favorite', 'destroy');
        Route::get('favorite', 'index');
    });
});

// Resume
Route::middleware(AuthUser::class)->group(function () {
    Route::controller(ResumeController::class)->group(function () {
        Route::patch('resume', 'update');
        Route::get('resume', 'index');
    });
    Route::controller(PortfolioController::class)->group(function () {
        Route::post('portfolio', 'store');
        Route::patch('portfolio/{portfolio}', 'update');
    });
    Route::controller(EducationController::class)->group(function () {
        Route::post('education', 'store');
        Route::patch('education/{education}', 'update');
    });
    Route::controller(WorkExperienceController::class)->group(function () {
        Route::post('work-experience', 'store');
        Route::patch('work-experience/{work_experience}', 'update');
    });
});
