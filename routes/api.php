<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TareaController;


// user routes
Route::get('/user', [EmpleadoController::class, 'index']);

Route::get('/user/{id}', [EmpleadoController::class, 'show']);

Route::post('/user', [EmpleadoController::class, 'store']);

Route::put('/user/{id}', [EmpleadoController::class, 'update']);

Route::patch('/user/{id}', [EmpleadoController::class, 'updatePartial']);

Route::delete('/user/{id}', [EmpleadoController::class, 'delete']);


// general user routes

Route::post('/user/register', function (Request $request) {
    // Logic to register a new user
});

Route::post('/user/login', function (Request $request) {
    // Logic to log in the user
});

Route::post('/user/logout', function (Request $request) {
    // Logic to log out the user
});

// task routes

Route::get('/tasks', [TareaController::class, 'index']);

Route::post('/tasks', [TareaController::class, 'store']);

Route::get('/tasks/{id}', [TareaController::class, 'show']);

Route::put('/tasks/{id}', [TareaController::class, 'update']);

Route::patch('/tasks/{id}', [TareaController::class, 'updatePartial']);

Route::delete('/tasks/{id}', [TareaController::class, 'delete']);
