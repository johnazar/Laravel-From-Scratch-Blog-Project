<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\RssFeedController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('feed', [RssFeedController::class, 'feed']);

Route::get('/posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('/newsletter', NewsletterController::class)->name('newsletter');

Route::post('/follow', [UserController::class,'follow'])->name('follow');
Route::post('/unfollow', [UserController::class,'unfollow'])->name('unfollow');

Route::post('/bookmark', [UserController::class,'bookmark'])->name('bookmark');
Route::post('/unbookmark', [UserController::class,'unbookmark'])->name('unbookmark');

Route::post('/avatarset', [UserController::class,'avatarset'])->name('avatarset');
Route::delete('/avatarremove', [UserController::class,'avatarremove'])->name('avatarremove');


Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest')->name('registerpost');

Route::get('/login', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [SessionsController::class, 'store'])->middleware('guest')->name('loginpost');

Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::as('profile.')->middleware('auth')->group(function () {
    Route::get('/profile/avatar',[ProfileController::class,'avatar'])->name('avatar');
    Route::get('/profile/bookmarks',[ProfileController::class,'bookmarks'])->name('bookmarks');
});

// Admin Section
Route::get('clearcache',[SettingController::class, 'clearcache'])->name('clearcache');
Route::as('admin.')->middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
    Route::post('clearcache',[SettingController::class, 'clearcache'])->name('clearcache');
    Route::post('seeddb',[SettingController::class, 'seeddb'])->name('seeddb');
    Route::post('queuework',[SettingController::class, 'queuework'])->name('queuework');
    Route::post('queuelisten',[SettingController::class, 'queuelisten'])->name('queuelisten');
    Route::post('queuestop',[SettingController::class, 'queuestop'])->name('queuestop');
    Route::post('schedulerun',[SettingController::class, 'schedulerun'])->name('schedulerun');
    Route::post('schedulework',[SettingController::class, 'schedulework'])->name('schedulework');
});
