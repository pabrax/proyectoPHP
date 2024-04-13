<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AsistenciaController;
use Illuminate\Support\Facades\Validator;
use App\Models\Empleado;
use App\Models\Asistencia;
use Illuminate\Support\Facades\Hash ;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $usuario = Empleado::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            $data = [
                'message' => 'Credenciales inválidas',
                'status' => 401
            ];
            return response()->json($data, 401);
        }

        // Registro de asistencia al inicio de sesión
        $asistenciaInicio = Asistencia::create([
            'hora_entrada' => now()->format('H:i:s'),
            'fecha' => now()->toDateString(),
            'empleado_id' => $usuario->id
        ]);

        $data = [
            'message' => 'Inicio de sesión exitoso',
            'status' => 200,
            'data' => $usuario
        ];

        return response()->json($data, 200);
    }


    public function logout(Request $request)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            $data = [
                'message' => 'Usuario no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        // Registro de asistencia al cierre de sesión
        $asistenciaFin = Asistencia::create([
            'hora_fin' => now()->format('H:i:s'),
            'fecha_fin' => now()->toDateString(),
            'usuario_id' => $usuario->id
        ]);

        $data = [
            'message' => 'Cierre de sesión exitoso',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
