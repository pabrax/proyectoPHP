<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Empleado;
use App\Models\Asistencia;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
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

        $data = $request->only('email', 'password');
        $remember = ($request->has('remember')) ? true : false;

        if (!Auth::attempt($data, $remember)) {
            $data = [
                'message' => 'Error al iniciar sesión',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $request->session()->regenerate();

        // Registro de asistencia al inicio de sesión
        $asistenciaInicio = Asistencia::create([
            'hora_entrada' => now()->format('H:i:s'),
            'fecha' => now()->toDateString(),
            'empleado_id' => $usuario->id
        ]);

        $data = [
            'message' => 'Inicio de sesion exitoso',
            'status' => 200,
            'data' => $usuario,
            'asistenciaInicio' => $asistenciaInicio
        ];

        return response()->json($data, 200);
    }

    public function me()
    {
        $user = Auth::user();

        if ($user) {
            return response()->json($user, 200);
        }

        return response()->json(null, 204);
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        // Registro de asistencia al cierre de sesión
        $asistencia = Asistencia::where('empleado_id', $user->id)
            ->where('fecha', now()->toDateString())
            ->first();

        $asistencia->hora_salida = now()->format('H:i:s');
        $asistencia->save();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(200);
    }
}
