<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TareaController;

// Rutas para el manejo de usuarios (CRUD)
Route::get('/users', [UsuarioController::class, 'index']); // Obtener todos los usuarios
Route::get('/users/{id}', [UsuarioController::class, 'show']); // Obtener un usuario específico
Route::put('/users/{id}', [UsuarioController::class, 'update']); // Actualizar un usuario
Route::delete('/users/{id}', [UsuarioController::class, 'destroy']); // Eliminar un usuario

//registro
Route::post('/users', [UsuarioController::class, 'store']); // Crear un nuevo usuario

//Login
Route::post('/login', [UsuarioController::class, 'login']); //Login

// Rutas para el manejo de tareas (CRUD)
Route::post('/tasks', [TareaController::class, 'store']); //  crear una nueva tarea
Route::get('/tasks/user/{userId}', [TareaController::class, 'getTasksByUser']);//Mostrar tareas por id del usuario
Route::get('/tasks/completed/{userId}', [TareaController::class, 'getCompletedTasks']);//Mostrar tareas completas
Route::get('/tasks/pendientes/{userId}', [TareaController::class, 'getIncompleteTasks']);//Mostrar tareas incompletas
Route::put('/tasks/{id}/completar', [TareaController::class, 'markAsCompleted']);//marcar tarea como completada
Route::put('/tasks/{task}', [TareaController::class, 'update']);//ediatr las tareas




