<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TareaController;


// user routes
Route::get('/user', [EmpleadoController::class, 'index']);

Route::get('/user/{id}', [EmpleadoController::class, 'show']);

Route::post('/user', [EmpleadoController::class, 'store']);

Route::put('/user/{id}', [EmpleadoController::class, 'update']);

Route::patch('/user/{id}', [EmpleadoController::class, 'updatePartial']);

Route::delete('/user/{id}', [EmpleadoController::class, 'delete']);

// task routes

Route::get('/tasks', [TareaController::class, 'index']);

Route::post('/tasks', [TareaController::class, 'store']);

Route::get('/tasks/{id}', [TareaController::class, 'show']);

Route::put('/tasks/{id}', [TareaController::class, 'update']);

Route::patch('/tasks/{id}', [TareaController::class, 'updatePartial']);

Route::delete('/tasks/{id}', [TareaController::class, 'delete']);
