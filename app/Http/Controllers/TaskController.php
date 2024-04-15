<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        if ($tasks->isEmpty()) {
            $data = [
                'message' => 'No hay tasks registradas',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'tasks recuperadas correctamente',
            'status' => '200',
            'data' => $tasks
        ];

        return response()->json($tasks, 200);
    }

    public function store(Request $request)
    {

        $validator = validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $tasks = Task::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_entrega' => $request->fecha_entrega
        ]);

        if (!$tasks) {
            $data = [
                'message' => 'Error al crear la task',
                'status' => 400
            ];
            return response()->json($data, 400);
        }

        $data = [
            'message' => 'task creada correctamente',
            'status' => 200,
            'data' => $tasks
        ];
        return response()->json($data, 200);
    }

    public function show($id)
    {
        $task = Task::find($id);

        if (!$task) {
            $data = [
                'message' => 'task no encontrada',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'task recuperada correctamente',
            'status' => '200',
            'data' => $task
        ];

        return response()->json($task, 200);
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            $data = [
                'message' => 'task no encontrada',
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

        $task = Task::where('id', $id)->update([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'fecha_entrega' => $request->fecha_entrega
        ]);

        $data = [
            'message' => 'task actualizada correctamente',
            'status' => 200,
            'data' => $task
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            $data = [
                'message' => 'task no encontrada',
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
            $task->titulo = $request->titulo;
        }
        if ($request->has('descripcion')) {
            $task->descripcion = $request->descripcion;
        }
        if ($request->has('fecha_entrega')) {
            $task->fecha_entrega = $request->fecha_entrega;
        }

        $task->save();

        $data = [
            'message' => 'task actualizada correctamente',
            'status' => 200,
            'data' => $task
        ];
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $task = Task::find($id);

        if (!$task) {
            $data = [
                'message' => 'task no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $task->delete();

        $data = [
            'message' => 'task eliminada correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}