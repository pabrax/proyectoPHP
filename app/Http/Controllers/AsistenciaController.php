<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asistencia;
use Illuminate\Support\Facades\Validator;

class AsistenciaController extends Controller
{
    public function index()
    {
        $Asistencias = Asistencia::all();

        if ($Asistencias->isEmpty()) {
            $data = [
                'message' => 'No hay asistencias registradas',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Asistencias recuperadas correctamente',
            'status' => '200',
            'data' => $Asistencias
        ];

        return response()->json($Asistencias, 200);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'fecha' => 'required',
            'hora_entrada' => 'required',
            'hora_salida' => '',
            'empleado_id' => 'required|exists:empleados,id'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $asistencia = Asistencia::create([
            'fecha' => $request->fecha,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'empleado_id' => $request->empleado_id
        ]);

        if (!$asistencia) {
            $data = [
                'message' => 'Error al registrar la asistencia',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
    }

    public function show($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            $data = [
                'message' => 'Asistencia no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Asistencia recuperada correctamente',
            'status' => 200,
            'data' => $asistencia
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            $data = [
                'message' => 'Asistencia no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'fecha' => 'required',
            'hora_entrada' => 'required',
            'hora_salida' => '',
            'empleado_id' => 'required|exists:empleados,id'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $asistencia = Asistencia::where('id', $id)->update([
            'fecha' => $request->fecha,
            'hora_entrada' => $request->hora_entrada,
            'hora_salida' => $request->hora_salida,
            'empleado_id' => $request->empleado_id
        ]);

        $data = [
            'message' => 'Asistencia actualizada correctamente',
            'status' => 200,
            'data' => $asistencia
        ];

        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            $data = [
                'message' => 'Asistencia no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'fecha' => '',
            'hora_entrada' => '',
            'hora_salida' => '',
            'empleado_id' => 'required|exists:empleados,id'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        if ($request->has('fecha')) {
            $asistencia->fecha = $request->fecha;
        }
        if ($request->has('hora_entrada')) {
            $asistencia->hora_entrada = $request->hora_entrada;
        }
        if ($request->has('hora_salida')) {
            $asistencia->hora_salida = $request->hora_salida;
        }
        if ($request->has('empleado_id')) {
            $asistencia->empleado_id = $request->empleado_id;
        }

        $asistencia->save();

        $data = [
            'message' => 'Asistencia actualizada correctamente',
            'status' => 200,
            'data' => $asistencia
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $asistencia = Asistencia::find($id);

        if (!$asistencia) {
            $data = [
                'message' => 'Asistencia no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $asistencia->delete();

        $data = [
            'message' => 'Asistencia eliminada correctamente',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
