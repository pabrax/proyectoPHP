<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\TaskController;


// user routes
Route::get('/user', [EmployeeController::class, 'index']);

Route::get('/user/{id}', [EmployeeController::class, 'show']);

Route::post('/user', [EmployeeController::class, 'store']);

Route::put('/user/{id}', [EmployeeController::class, 'update']);

Route::patch('/user/{id}', [EmployeeController::class, 'updatePartial']);

Route::delete('/user/{id}', [EmployeeController::class, 'delete']);

// task routes

Route::get('/tasks', [TaskController::class, 'index']);

Route::post('/tasks', [TaskController::class, 'store']);

Route::get('/tasks/{id}', [TaskController::class, 'show']);

Route::put('/tasks/{id}', [TaskController::class, 'update']);

Route::patch('/tasks/{id}', [TaskController::class, 'updatePartial']);

Route::delete('/tasks/{id}', [TaskController::class, 'delete']);
