<?php

// app/Http/Controllers/UsuarioController.php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        return Usuario::all();
    }

   // Crear un nuevo usuario
   public function store(Request $request)
   {
       try {
           $request->validate([
               'nombre' => 'required|string|max:100',
               'correo' => 'required|string|email|unique:usuarios,correo|max:100',
               'password' => 'required|string|min:6|max:15',
           ]);

           // Crea un nuevo usuario con la contraseña tal cual
           $usuario = new Usuario();
           $usuario->nombre = $request->nombre;
           $usuario->correo = $request->correo;
           $usuario->password = $request->password;
           $usuario->save();

           return response()->json($usuario, 201);
       } catch (\Exception $e) {
           // Captura cualquier excepción y devuelve un mensaje de error
           return response()->json([
               'message' => 'Error al crear el usuario',
               'error' => $e->getMessage()
           ], 500);
       }
   }
    // Obtener usuario por id
    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    // Actualizar usuario
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'string|max:100',
            'correo' => 'string|email|max:100',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario, 200);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(null, 204);
    }

    //  Login
    public function login(Request $request)
    {
        $request->validate([
            'correo' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Buscar al usuario por correo
        $user = Usuario::where('correo', $request->correo)->first();

        if (!$user || $user->password !== $request->password) {
            return response()->json(['success' => false, 'message' => 'Credenciales incorrectas'], 401);
        }

        return response()->json([
            'success' => true,
            'message' => 'Inicio de sesión exitoso',
            'user' => $user,
        ]);
    }



}
