<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function mostrarFormulario()
    {
        return view('registro_usuario');
    }

    public function guardarUsuario(Request $request)
    {
        
    // Validación de datos
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:usuarios,email', 
    ]);


    $usuario = new Usuario();
    $usuario->name = $request->input('name');
    $usuario->email = $request->input('email');
    $usuario->lastname = $request->input('lastname');
    $usuario->tarea_usuario = $request->input('tarea_usuario');
    $usuario->id = $request->input('id');
    $usuario->email = $request->input('email');
    $usuario->pwd = bcrypt($request->input('pwd'));

    
    $usuario->save();

    // Redirigir a una ruta específica o mostrar un mensaje de confirmación
    return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }
}
