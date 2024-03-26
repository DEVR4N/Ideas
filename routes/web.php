<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'ideas/', 'as'=>'ideas.'], function () {

    Route::post('', [IdeaController::class, 'store'])->name('create')->withoutMiddleware('[auth]');
    Route::get('{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware('[auth]');
    Route::group(['middleware' => 'auth'], function () {
        Route::get('create', [IdeaController::class, 'create'])->name('create');
        Route::get('{idea}/edit', [IdeaController::class, 'edit'])->name('edit');
        Route::put('{idea}', [IdeaController::class, 'update'])->name('update');
        Route::delete('/{idea}', [IdeaController::class, 'destroy'])->name('destroy');
        Route::post('/{idea}/comments', [CommentController::class, 'store'])->name('comments.store');

    });
});


