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
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\IdeaController as AdminIdeaController;
use App\Http\Controllers\Admin\CommentController as AdminCommentController;


Route::get('lang/{lang}', function ($lang) {
    app()->setLocale($lang);
    session()->put('locale', $lang);
    return redirect()->route('dashboard');
})->name('lang');

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('users', UserController::class)->only(['show']);

Route::resource('users', UserController::class)->only(['edit', 'update'])->middleware('auth');

Route::get('profile', [UserController::class, 'profile'])->name('profile')->middleware('auth');

Route::post('user/{user}/follow', [FollowerController::class, 'follow'])->name('user.follow')->middleware('auth');

Route::post('user/{user}/unfollow', [FollowerController::class, 'unfollow'])->name('user.unfollow')->middleware('auth');


Route::get('/feed', FeedController::class)->name('feed')->middleware('auth');


Route::get('/terms', function () {
    return view('terms');
})->name('terms');

// Ideas routes
Route::middleware(['auth'])->group(function () {
    Route::resource('ideas', IdeaController::class)->only(['show']);
    Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth', 'can:admin');
//    Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth', 'can:admin');
    Route::resource('ideas.comments', CommentController::class)->only(['store', 'edit', 'update', 'destroy'])->middleware('auth');
    Route::post('ideas/{idea}/like', [IdeaLikeController::class, 'like'])->name('ideas.like');
    Route::post('ideas/{idea}/unlike', [IdeaLikeController::class, 'unlike'])->name('ideas.unlike');
});

// Admin routes
Route::middleware(['auth', 'can:admin'])->prefix('/admin')->as('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', AdminUserController::class)->only('index');
    Route::resource('ideas', AdminIdeaController::class)->only('index');
    Route::resource('comments', AdminCommentController::class)->only(['index', 'destroy']);
});



