<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NewsController;
use PHPUnit\Event\Code\Test;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::middleware(['auth'])->resource('dashboard', DashboardController::class);
Route::middleware(['auth'])->resource('categories', CategoryController::class);

// Define the NewsController resource route
Route::middleware(['auth'])->resource('news', NewsController::class);

// Add a specific route for showing a single news article
Route::get('/newsShow/{id}', [NewsController::class, 'show'])->name('newsShow');
