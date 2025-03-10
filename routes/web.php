<?php

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HiloController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RankingController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [HiloController::class, 'index'])->name('welcome');

// Ver un hilo con todos sus posts
Route::get('/hilos/{hilo}', [HiloController::class, 'show'])->name('hilos.show');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/algo', [HiloController::class, 'create'])->name('hilos.create');
    Route::post('/hilos/create/guardar', [HiloController::class, 'store'])->name('hilos.store');

    // Añadir un post a un hilo
    Route::post('/hilos/{hilo}/posts', [PostController::class, 'store'])->name('posts.store');

    // Dar "me gusta" a un post
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
});

Route::middleware(AdminMiddleware::class)->group(function () {
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.index');
    Route::delete('/admin/users/{user}', [AdminUserController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/users/{user}/edit', [AdminUserController::class, 'edit'])->name('admin.edit');
    Route::patch('/admin/users/{user}', [AdminUserController::class, 'update'])->name('admin.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});

Route::get('/ranking', [RankingController::class, 'index'])->name('ranking.index');


require __DIR__ . '/auth.php';
