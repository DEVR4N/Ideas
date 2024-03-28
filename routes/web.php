<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaLikeController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is w  here you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/admin', [AdminDashboardController::class, 'index'])->name('admin.dashboard')
    ->middleware(['auth', 'admin']);

Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])
    ->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])
    ->middleware('auth');

Route::resource('users', UserController::class)->only(['show']);

Route::resource('users', UserController::class)->only(['edit', 'update'])
    ->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->name('profile')
    ->middleware('auth');

Route::post('user/{user}/follow', [FollowerController::class, 'follow'])
    ->name('user.follow')
    ->middleware('auth');

Route::post('user/{user}/unfollow', [FollowerController::class, 'unfollow'])
    ->name('user.unfollow')
    ->middleware('auth');

Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])
    ->name('ideas.like')
    ->middleware('auth');

Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])
    ->name('ideas.unlike')
    ->middleware('auth');

Route::get('/feed', FeedController::class)->name('feed')
    ->middleware('auth');



Route::get('/terms', function () {
    return view('terms');
})->name('terms');


