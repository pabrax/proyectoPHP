<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// rutas pre auth

Route::get('/', function () {
    return view('welcome');
});

// login routes

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// App routes (post auth)

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', function () {
    return view('users');
})->middleware(CheckRole::class)->name('users');

Route::get('/assists', function () {
    return view('assists');
})->middleware('auth')->name('assists');

// creada por Daniel cardona arroyave

Route::get('/tasks', function () {
    return view('tasks');
})->middleware('auth')->name('tasks');
