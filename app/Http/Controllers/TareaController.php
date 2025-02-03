<?php
// app/Http/Controllers/TareaController.php

namespace App\Http\Controllers;

use App\Models\Tarea;
use App\Models\Usuario;
use Illuminate\Http\Request;

class TareaController extends Controller
{


    //  Crear Tarea
    public function store(Request $request)
    {
        try {
            // Validar los datos
            $validatedData = $request->validate([
                'usuario_id' => 'required|exists:usuarios,id',
                'titulo' => 'required|string|max:255',
                'descripcion' => 'nullable|string',
                'completada' => 'boolean',
            ]);

            // Crear la tarea con los datos validados
            $tarea = Tarea::create([
                'usuario_id' => $validatedData['usuario_id'],
                'titulo' => $validatedData['titulo'],
                'descripcion' => $validatedData['descripcion'],
                'completada' => $validatedData['completada'] ?? false,  // Si no se pasa, se asigna como false
            ]);

            // Devolver la tarea recién creada
            return response()->json($tarea, 201);
        } catch (\Exception $e) {
            // Capturar cualquier excepción y devolver un error
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    //Mostrar tareas por usuario
    public function getTasksByUser($userId)
{
    $tareas = Tarea::where('usuario_id', $userId)->get();
    return response()->json($tareas);
}


    //Mostrar tareas completadas
    public function getCompletedTasks($userId)
    {
        $tareas = Tarea::where('usuario_id', $userId)
                    ->where('completada', true)
                    ->get();

        return response()->json($tareas);
    }

    //Mostrar tareas pendientes del usuario logueado

    public function getIncompleteTasks($userId)
    {
        $tareas = Tarea::where('usuario_id', $userId)
                    ->where('completada', false)
                    ->get();

        return response()->json($tareas);
    }
}
