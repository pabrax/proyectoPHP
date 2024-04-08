<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;



// user routes

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

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

Route::get('/tasks', function (Request $request) {
    // get all tasks
});

Route::post('/tasks', function (Request $request) {
    // post a task
});

Route::get('/tasks/{id}', function ($id) {
    // Logic to retrieve a specific task by ID
});

Route::put('/tasks/{id}', function (Request $request, $id) {
    // Logic to update a specific task by ID
});

Route::delete('/tasks/{id}', function ($id) {
    // Logic to delete a specific task by ID
});
