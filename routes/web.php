<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;

Route::get('/', function () {
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::get('users/{filter}', [UserController::class, 'index']);

    // Announcements
    Route::resource('announcements', AnnouncementController::class);

    // Business
    Route::resource('business', BusinessController::class);
    Route::resource('project', ProjectController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('product', ProductController::class);
    Route::resource('event', EventController::class);
    Route::resource('forum', ForumController::class);
    Route::resource('research', ResearchController::class);
    Route::resource('blog', BlogController::class);

    // Route::resource('image', ImageController::class);
    // Route::resource('file', FileController::class);
    // Route::resource('fav', FavoriteController::class);
    // Route::resource('like', LikeController::class);
});
