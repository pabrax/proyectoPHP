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
            'employee_id' => 'required|exists:employees,id',
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
            'employee_id' => $request->employee_id,
            'title' => $request->title,
            'description' => $request->description
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
    // creado por felipe leon osorio
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
    
    // creado por felipe leon osorio
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
            'employee_id' => 'exists:employees,id',
            'title' => 'required',
            'description' => 'required',
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
            'employee_id' => $request->employee_id,
            'title' => $request->title,
            'description' => $request->description
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
            'employee_id' => 'exists:employees,id',
            'title' => '',
            'description' => '',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        if ($request->has('employee_id')) {
            $task->employee_id = $request->employee_id;
        }

        if ($request->has('title')) {
            $task->title = $request->title;
        }
        if ($request->has('description')) {
            $task->description = $request->description;
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

    // created by Daniel cardona arroyave
    public function showUnassignedTasks()
    {
        $tasks = Task::doesntHave('employee')->get();

        if ($tasks->isEmpty()) {
            $data = [
                'message' => 'No hay tareas sin asignar',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Tareas sin asignar recuperadas correctamente',
            'status' => '200',
            'data' => $tasks
        ];

        return response()->json($data, 200);
    }
}
