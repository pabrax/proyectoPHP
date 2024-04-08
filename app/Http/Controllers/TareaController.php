<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\Validator;


class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();

        if ($tareas->isEmpty()) {
            $data = [
                'message' => 'No hay tareas registradas',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Tareas recuperadas correctamente',
            'status' => '200',
            'data' => $tareas
        ];

        return response()->json($tareas, 200);
    }

    public function store(Request $request)
    {

        $validator = validator::make($request->all(), [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_entrega' => 'required|date'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $tareas = Tarea::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_entrega' => $request->fecha_entrega
        ]);

        if (!$tareas) {
            $data = [
                'message' => 'Error al crear la tarea',
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $data = [
            'message' => 'Tarea creada correctamente',
            'status' => 200,
            'data' => $tareas
        ];
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            $data = [
                'message' => 'Tarea no encontrada',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Tarea recuperada correctamente',
            'status' => '200',
            'data' => $tarea
        ];

        return response()->json($tarea, 200);
    }

    public function update(Request $request, $id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            $data = [
                'message' => 'Tarea no encontrada',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $valitador = validator::make($request->all(), [
            'titulo' => 'required',
            'descripcion' => 'required',
            'fecha_entrega' => 'required|date'
        ]);

        if ($valitador->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $valitador->errors()
            ];
            return response()->json($data, 400);
        }

        $tarea = Tarea::where('id', $id)->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_entrega' => $request->fecha_entrega
        ]);

        $data = [
            'message' => 'Tarea actualizada correctamente',
            'status' => 200,
            'data' => $tarea
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            $data = [
                'message' => 'Tarea no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'titulo' => '',
            'descripcion' => '',
            'fecha_entrega' => 'date'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        if ($request->has('titulo')) {
            $tarea->titulo = $request->titulo;
        }
        if ($request->has('descripcion')) {
            $tarea->descripcion = $request->descripcion;
        }
        if ($request->has('fecha_entrega')) {
            $tarea->fecha_entrega = $request->fecha_entrega;
        }

        $tarea->save();

        $data = [
            'message' => 'Tarea actualizada correctamente',
            'status' => 200,
            'data' => $tarea
        ];
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $tarea = Tarea::find($id);

        if (!$tarea) {
            $data = [
                'message' => 'Tarea no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $tarea->delete();

        $data = [
            'message' => 'Tarea eliminada correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
