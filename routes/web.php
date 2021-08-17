<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('', [PostController::class, 'index'])->name('home');
Route::get('feed', [RssFeedController::class, 'feed']);

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/newsletter', NewsletterController::class)->name('newsletter');

Route::post('/follow', [UserController::class,'follow'])->name('follow');
Route::post('/unfollow', [UserController::class,'unfollow'])->name('unfollow');


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('registerpost');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest')->name('loginpost');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');

// Admin Section
Route::as('admin.')->middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});
