<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Empleado;
use Illuminate\Support\Facades\Validator;


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
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:empleados,email',
            'tipo_usuario' => 'required|in:gerente,empleado,RRHH,CEO,marketing'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $empleado = Empleado::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario
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
            'nombre' => 'required',
            'apellido' => 'required',
            'email' => 'required|email|unique:empleados,email,' . $id,
            'tipo_usuario' => 'required|in:gerente,empleado,RRHH,CEO,marketing'
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
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'tipo_usuario' => $request->tipo_usuario
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
            'nombre' => '',
            'apellido' => '',
            'email' => '|email|unique:empleados,email,' . $id,
            'tipo_usuario' => '|in:gerente,empleado,RRHH,CEO,marketing'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        if ($request->has('nombre')) {
            $empleado->nombre = $request->nombre;
        }
        if ($request->has('apellido')) {
            $empleado->apellido = $request->apellido;
        }

        if ($request->has('email')) {
            $empleado->email = $request->email;
        }
        if ($request->has('tipo_usuario')) {
            $empleado->tipo_usuario = $request->tipo_usuario;
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
