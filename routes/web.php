<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;

Auth::routes();

// rutas pre auth

Route::get('/', function () {
    return view('welcome');
});

// login routes

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// App routes (post auth)

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/users', [EmployeeController::class, 'index'])->middleware(CheckRole::class)->name('users');

Route::get('/assists', [AssistController::class, 'index'])->middleware('auth')->name('assists');

// creada por Daniel cardona arroyave

<<<<<<< HEAD
Route::get('/tasks', function () {
    return view('tasks');
})->middleware('auth')->name('tasks');
=======
Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth')->name('tasks');
>>>>>>> cc91345ab02f7e225a5d2018eb874a11b6d79770
