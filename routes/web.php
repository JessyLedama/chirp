<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeChirpsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoCategoryController;


Route::view('/', 'welcome');

// AUTHENTICATED ROUTES
Route::middleware(['auth', 'verified'])->group(function(){
    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::view('profile', 'profile')->name('profile');

    Route::get('posts', [ChirpController::class, 'index'])->name('chirps');

    Route::get('user/{name}', [UserController::class, 'show'])->name('user.show');

    Route::post('likechirp', [LikeChirpsController::class, 'store'])->name('likechirp');

    Route::post('comment/{chirp}', [CommentController::class, 'store'])->name('comment.chirp');

    Route::get('videos', [VideoController::class, 'videos'])->name('videos');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    // STATUS
    Route::prefix('status')->group(function(){
        Route::get('/', [StatusController::class, 'index'])->name('admin.status.index');
        Route::get('create', [StatusController::class, 'create'])->name('admin.status.create');
        Route::get('/{slug}', [StatusController::class, 'show'])->name('admin.status.show');
        Route::post('/{slug}', [StatusController::class, 'store'])->name('admin.status.store');
        Route::get('edit/{slug}', [StatusController::class, 'edit'])->name('admin.status.edit');
        Route::post('edit/{slug}', [StatusController::class, 'update'])->name('admin.status.update');
    });

    // ROLE
    Route::prefix('roles')->group(function(){
        Route::get('/', [StatusController::class, 'index'])->name('admin.roles.index');
        Route::get('create', [StatusController::class, 'create'])->name('admin.roles.create');
        Route::get('/{slug}', [StatusController::class, 'show'])->name('admin.roles.show');
        Route::post('/{slug}', [StatusController::class, 'store'])->name('admin.roles.store');
        Route::get('edit/{slug}', [StatusController::class, 'edit'])->name('admin.roles.edit');
        Route::post('edit/{slug}', [StatusController::class, 'update'])->name('admin.roles.update');
    });

    // USER
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::get('/{slug}', [UserController::class, 'show'])->name('admin.user.show');
        Route::post('/{slug}', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('edit/{slug}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('edit/{slug}', [UserController::class, 'update'])->name('admin.user.update');
    });

    // CATEGORIES
    Route::prefix('categories')->group(function(){
        Route::get('/', [VideoCategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('create', [VideoCategoryController::class, 'create'])->name('admin.categories.create');
        Route::get('/{slug}', [VideoCategoryController::class, 'show'])->name('admin.categories.show');
        Route::post('/{slug}', [VideoCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('edit/{slug}', [VideoCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('edit/{slug}', [VideoCategoryController::class, 'update'])->name('admin.categories.update');
    });
});

Route::post('logout', [UserController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';
