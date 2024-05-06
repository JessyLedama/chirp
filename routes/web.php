<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;


Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('chirps', [ChirpController::class, 'index'])->middleware(['auth', 'verified'])->name('chirps');

Route::get('{name}', [UserController::class, 'show'])->middleware(['auth'])->name('user.show');

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

    // USER
    Route::prefix('user')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::get('/{slug}', [UserController::class, 'show'])->name('admin.user.show');
        Route::post('/{slug}', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('edit/{slug}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::post('edit/{slug}', [UserController::class, 'update'])->name('admin.user.update');
    });
});

require __DIR__.'/auth.php';
