<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikeChirpsController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\VideoCategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SlideshowController;


Route::view('/', 'welcome');

// AUTHENTICATED ROUTES
Route::middleware(['auth', 'verified'])->group(function(){

    Route::view('profile', 'profile')->name('profile');

    Route::get('posts', [ChirpController::class, 'index'])->name('chirps');

    Route::get('user/{name}', [UserController::class, 'show'])->name('user.show');

    Route::post('likechirp', [LikeChirpsController::class, 'store'])->name('likechirp');

    Route::post('comment/{chirp}', [CommentController::class, 'store'])->name('comment.chirp');

    Route::get('videos', [VideoController::class, 'videos'])->name('videos');

    Route::get('videos/{slug}', [VideoController::class, 'video'])->name('video.show');

    Route::post('logout', [UserController::class, 'destroy'])->name('logout');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    // DASHBOARD
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
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

    // USERS
    Route::prefix('users')->group(function(){
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
        Route::get('create', [UserController::class, 'create'])->name('admin.users.create');
        Route::get('/{slug}', [UserController::class, 'show'])->name('admin.users.show');
        Route::post('users/{slug}', [UserController::class, 'store'])->name('admin.users.store');
        Route::get('edit/{slug}', [UserController::class, 'edit'])->name('admin.users.edit');
        Route::post('edit/{slug}', [UserController::class, 'update'])->name('admin.users.update');
    });

    // CATEGORIES
    Route::prefix('categories')->group(function(){
        Route::get('/', [VideoCategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('create', [VideoCategoryController::class, 'create'])->name('admin.categories.create');
        Route::get('/{slug}', [VideoCategoryController::class, 'show'])->name('admin.categories.show');
        Route::post('/store/', [VideoCategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('edit/{slug}', [VideoCategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('edit/{slug}', [VideoCategoryController::class, 'update'])->name('admin.categories.update');
    });

    // SUBCATEGORIES
    Route::prefix('subcategories')->group(function(){
        Route::get('/', [SubcategoryController::class, 'index'])->name('admin.subcategories.index');
        Route::get('create', [SubcategoryController::class, 'create'])->name('admin.subcategories.create');
        Route::get('/{slug}', [SubcategoryController::class, 'show'])->name('admin.subcategories.show');
        Route::post('/store/', [SubcategoryController::class, 'store'])->name('admin.subcategories.store');
        Route::get('edit/{slug}', [SubcategoryController::class, 'edit'])->name('admin.subcategories.edit');
        Route::post('edit/{slug}', [SubcategoryController::class, 'update'])->name('admin.subcategories.update');
    });

    // VIDEOS
    Route::prefix('videos')->group(function(){
        Route::get('/', [VideoController::class, 'index'])->name('admin.videos.index');
        Route::get('create', [VideoController::class, 'create'])->name('admin.videos.create');
        Route::get('/{slug}', [VideoController::class, 'show'])->name('admin.videos.show');
        Route::post('/', [VideoController::class, 'store'])->name('admin.videos.store');
        Route::get('edit/{slug}', [VideoController::class, 'edit'])->name('admin.videos.edit');
        Route::post('edit/{slug}', [VideoController::class, 'update'])->name('admin.videos.update');
    });

    // ORDERS
    Route::prefix('orders')->group(function(){
        Route::get('/', [OrderController::class, 'index'])->name('admin.orders.index');
        Route::get('create', [OrderController::class, 'create'])->name('admin.orders.create');
        Route::get('/{slug}', [OrderController::class, 'show'])->name('admin.orders.show');
        Route::post('/{slug}', [OrderController::class, 'store'])->name('admin.orders.store');
        Route::get('edit/{slug}', [OrderController::class, 'edit'])->name('admin.orders.edit');
        Route::post('edit/{slug}', [OrderController::class, 'update'])->name('admin.orders.update');
    });

    // SLIDES
    Route::prefix('slides')->group(function(){
        Route::get('/', [SlideshowController::class, 'index'])->name('admin.slides.index');
        Route::get('create', [SlideshowController::class, 'create'])->name('admin.slides.create');
        Route::get('/{slug}', [SlideshowController::class, 'show'])->name('admin.slides.show');
        Route::post('/', [SlideshowController::class, 'store'])->name('admin.slides.store');
        Route::get('edit/{slug}', [SlideshowController::class, 'edit'])->name('admin.slides.edit');
        Route::post('edit/{slug}', [SlideshowController::class, 'update'])->name('admin.slides.update');
    });
});

require __DIR__.'/auth.php';
