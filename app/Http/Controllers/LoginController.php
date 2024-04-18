<?php

// creado por santiago bedoya santa

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Employee;
use App\Models\Assists;

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

        $user = Employee::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
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
        $asistenciaInicio = Assists::create([
            'entry_time' => now()->format('H:i:s'),
            'date' => now()->toDateString(),
            'employee_id' => $user->id
        ]);

        return redirect('/dashboard');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if (!$user) {
            $data = [
                'message' => 'No has iniciado sesion',
                'status' => 401
            ];
            return response()->json($data, 401);
        }

        // Registro de asistencia al cierre de sesión
        $asistencia = Assists::where('employee_id', $user->id)
            ->where('date', now()->toDateString())
            ->first();

        $asistencia->exit_time = now()->format('H:i:s');
        $asistencia->save();

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $data = [
            'message' => 'cierre de sesion exitoso',
            'status' => 200,
        ];

        return redirect('/');
        // return response()->json($data, 200);
    }
}
