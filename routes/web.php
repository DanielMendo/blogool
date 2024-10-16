<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AccountSettingsController;

// Rutas de autenticación
Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'store']);
Route::get('/logout', [LogoutController::class, 'store'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Rutas de notificaciones
Route::get('/notifications', NotificationController::class)->name('notifications')->middleware('auth');

// Rutas de configuración de cuenta
Route::prefix('settings')->name('settings.')->group(function () {
    Route::get('/', [AccountSettingsController::class, 'index'])->name('view');
    Route::put('/emailUpdate/{user}', [AccountSettingsController::class, 'updateEmail'])->name('emailUpdate');
    Route::put('/updatePassword/{user}', [AccountSettingsController::class, 'updatePassword'])->name('updatePassword');
    Route::delete('/deleteAccount/{user}', [AccountSettingsController::class, 'deleteAccount'])->name('deleteAccount');
});

// Rutas de inicio
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Rutas de publicación
Route::get('{user:slug}/post/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::middleware('auth')->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/create', [PostController::class, 'store'])->name('post.store');
    Route::get('post/edit/{post:slug}', [PostController::class, 'edit'])->name('post.edit');
    Route::put('post/update/{post}', [PostController::class, 'update'])->name('post.update');
    Route::delete('post/delete/{post}', [PostController::class, 'destroy'])->name('post.destroy');
    
    // Rutas de comentarios
    Route::post('post/{post}/comment', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

    // Rutas de likes
    Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('like.store');
    Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('like.destroy');
});

// Rutas de categorías
Route::get('categories/{category:name}', [CategoryController::class, 'show'])->name('category.show');

// Rutas de perfil
Route::get('/{user:slug}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('profile/edit/{user:slug}', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('profile/update/{user}', [ProfileController::class, 'update'])->name('profile.update');

// Rutas de seguidores
Route::post('/{user:slug}/follow', [FollowerController::class, 'store'])->name('user.follow');
Route::delete('/{user:slug}/destroy', [FollowerController::class, 'destroy'])->name('user.unfollow');

// Rutas de imagen
Route::post('/image', [ImageController::class, 'store'])->name('image.store');

