<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckRole;

// rutas pre auth

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [LoginController::class, 'login'])->name('login');

// rutas definidas post auth

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/users', function () {
    return view('users');
})->middleware(CheckRole::class)->name('users');

Route::get('/assists', function () {
    return view('assists');
})->middleware('auth')->name('assists');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// creada por Daniel cardona arroyave
Route::get('/tasks', function () {
    return view('tasks');
})->middleware('auth')->name('tasks');