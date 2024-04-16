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

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/me', [LoginController::class, 'me']);


Route::get('/login2', function () {
    return view('login2');
});

Route::get('/welcome2', function () {
    return view('welcome2');
});

// Esta es la ruta que se encargara de gestionar la parte administrativa de los ususarios, como crear ususarios, eliminarlos, actualizarlos, etc. a su vez se encargara de gestionar y asignar las tareas de los empleados.

Route::get('/testCheck', function () {
    return response()->json(['message' => 'I am alive'], 200);
})->middleware(CheckRole::class);

Route::get('/tasks', function () {
    return view('tasks');
})->middleware('auth');
