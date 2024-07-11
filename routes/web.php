<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FacebookController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda. Semua rute
| ini dimuat oleh ServiceProvider dan semuanya akan diberikan ke grup middleware "web".
| Buat sesuatu yang hebat!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Autentikasi
Auth::routes([
    // 'register' => true,
    'verify' => true
    // 'reset' => true,
    // 'confirm' => true,
    // 'logout' => true,
]);

// Rute beranda
Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

// Rute tampilkan berita berdasarkan ID
Route::get('/newsShow/{id}', [NewsController::class, 'show'])
    ->name('newsShow')
    ->middleware('auth');

// Grup rute untuk admin
Route::group([
    'middleware' => ['auth', 'role:admin'],
    'prefix' => 'admin',
], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('news', NewsController::class);
    Route::resource('users', UserController::class);
    // routes/web.php
Route::post('/image/upload', ImageController::class . '@upload');
});

// Rute login dengan Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])
    ->name('google.login');

// Penanganan pemanggilan balik dari Google setelah otorisasi
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])
    ->name('google.callback');

// Rute login dengan Facebook
Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook'])
    ->name('facebook.login');

// Penanganan pemanggilan balik dari Facebook setelah otorisasi
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback'])
    ->name('facebook.callback');

// Rute registrasi dengan Google+
Route::get('auth/google/signup', [GoogleController::class, 'redirectToGoogleSignup'])
    ->name('google.signup');

// Penanganan pemanggilan balik dari Google+ setelah otorisasi untuk registrasi
Route::get('auth/google/signup/callback', [GoogleController::class, 'handleGoogleSignupCallback'])
    ->name('google.signup.callback');
