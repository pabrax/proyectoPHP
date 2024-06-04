<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AssistController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RoleController;

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

Route::get('/assists', [AssistController::class, 'index'])->middleware('auth')->name('assists');

// creada por Daniel cardona arroyave

// tasks routes

Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth')->name('tasks');

Route::put('/tasks/{id}', [TaskController::class, 'update'])->middleware('auth')->name('tasks.update');

Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->middleware(CheckRole::class)->name('tasks.edit');

Route::delete('/tasks/{id}', [TaskController::class, 'delete'])->middleware('auth')->name('tasks.delete');

Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth')->name('tasks.create');

Route::post('/tasks', [TaskController::class, 'store'])->middleware('auth')->name('tasks.store');

// user routes

Route::get('/users', [EmployeeController::class, 'index'])->middleware(CheckRole::class)->name('users');

Route::post('/users', [EmployeeController::class, 'store'])->middleware(CheckRole::class)->name('users.store');

Route::put('/users/{id}', [EmployeeController::class, 'update'])->middleware(CheckRole::class)->name('users.update');

Route::get('/users/{id}/edit', [EmployeeController::class, 'edit'])->middleware(CheckRole::class)->name('users.edit');

Route::get('/users/create', [EmployeeController::class, 'create'])->middleware(CheckRole::class)->name('users.create');

Route::delete('/users/{id}', [EmployeeController::class, 'delete'])->middleware(CheckRole::class)->name('users.delete');

// Role routes


Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');

// Ruta para mostrar el formulario de creación de roles
Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');

// Ruta para almacenar un nuevo rol
Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');

// Ruta para mostrar el formulario de edición de roles
Route::get('/roles/{id}/edit', [RoleController::class, 'edit'])->name('roles.edit');

// Ruta para actualizar un rol existente
Route::put('/roles/{id}', [RoleController::class, 'update'])->name('roles.update');

// Ruta para eliminar un rol
Route::delete('/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
