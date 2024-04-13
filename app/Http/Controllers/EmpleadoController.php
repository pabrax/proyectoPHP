<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class EmpleadoController extends Controller
{
    public function index()
    {
        $Empleados = Empleado::all();

        if ($Empleados->isEmpty()) {
            $data = [
                'message' => 'No hay empleados registrados',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Empleados recuperados correctamente',
            'status' => '200',
            'data' => $Empleados
        ];

        return response()->json($Empleados, 200);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:empleados,email',
            'password' => 'required|min:8',
            'user_type' => 'required|in:gerente,empleado,RRHH,CEO,marketing'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $pwd = Hash::make($request->password);

        $empleado = Empleado::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $pwd,
            'user_type' => $request->user_type
        ]);

        if (!$empleado) {
            $data = [
                'message' => 'Error al registrar el empleado',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Empleado registrado correctamente',
            'status' => 201,
            'data' => $empleado
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Empleado recuperado correctamente',
            'status' => 200,
            'data' => $empleado
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:empleados,email,' . $id,
            'user_type' => 'required|in:gerente,empleado,RRHH,CEO,marketing'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $empleado = Empleado::where('id', $id)->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'user_type' => $request->user_type
        ]);

        $data = [
            'message' => 'Empleado actualizado correctamente',
            'status' => 200,
            'data' => $empleado
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'name' => '',
            'lastname' => '',
            'email' => '|email|unique:empleados,email,' . $id,
            'user_type' => '|in:gerente,empleado,RRHH,CEO,marketing'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        if ($request->has('name')) {
            $empleado->name = $request->name;
        }
        if ($request->has('lastname')) {
            $empleado->lastname = $request->lastname;
        }

        if ($request->has('email')) {
            $empleado->email = $request->email;
        }
        if ($request->has('user_type')) {
            $empleado->user_type = $request->user_type;
        }

        $empleado->save();

        $data = [
            'message' => 'Empleado actualizado correctamente',
            'status' => 200,
            'data' => $empleado
        ];
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            $data = [
                'message' => 'Empleado no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $empleado->delete();

        $data = [
            'message' => 'Empleado eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
