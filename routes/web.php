<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
});

// rutas definidas post auth

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

// creada por Daniel cardona arroyave
Route::get('/tasks', function () {
    return view('tasks');
})->middleware('auth')->name('tasks');

Route::get('/users', function () {
    return view('users');
})->middleware('auth')->name('users');

Route::get('/assists', function () {
    return view('assists');
})->middleware('auth')->name('assists');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// rutas POST
Route::post('/login', [LoginController::class, 'login'])->name('login');