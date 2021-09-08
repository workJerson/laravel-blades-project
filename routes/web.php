<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::resource('dashboard', DashboardController::class, ['except' => ['edit', 'create']]);
Route::resource('logout', LogoutController::class, ['except' => ['edit', 'create']]);
Route::resource('login', LoginController::class, ['except' => ['edit', 'create']]);
Route::resource('register', RegisterController::class, ['except' => ['edit', 'create']]);

Route::get('/posts', function () {
    // return view('welcome');
    return view('posts.index');
})->name('posts');
