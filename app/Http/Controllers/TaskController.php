<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class TaskController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $tasks = Task::where('employee_id', $user->id)->get();


        if ($tasks->isEmpty()) {
            $data = [
                'message' => 'No hay tasks registradas',
                'status' => '404'
            ];
            return view('tasks', compact('tasks'));
        }

        return view('tasks', compact('tasks'));
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
            return redirect()->route('tasks')->with('error', 'Error al crear la task');
        }


        return redirect()->route('tasks')->with('success', 'Task creada correctamente');
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

        return view('tasks', compact('task'));
    }

    // creado por felipe leon osorio
    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->route('tasks')->with('error', 'task no encontrada');
        }

        $valitador = validator::make($request->all(), [
            'employee_id' => 'exists:employees,id',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($valitador->fails()) {
            return redirect()->route('tasks.update', $id)->withErrors($valitador)->withInput();
        }

        $task = Task::where('id', $id)->update([
            'employee_id' => $request->employee_id,
            'title' => $request->title,
            'description' => $request->description
        ]);


        return redirect()->route('tasks')->with('success', 'Task actualizada correctamente');

        // return view('tasks', compact('task'));
    }

    public function edit($id)
    {
        $task = Task::find($id);

        if (!$task) {
            return redirect()->route('tasks')->with('error', 'task no encontrada');
        }

        $employees = Employee::all();
        return view('task_crud', compact('task', 'employees'));
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

        return view('tasks', compact('task'));
    }

    public function delete($id)
    {
        $task = Task::find($id);

        if (!$task) {
            $data = [
                'message' => 'task no encontrada',
                'status' => 404
            ];
            return redirect()->route('tasks')->with('error', 'task no encontrada');
        }

        $task->delete();

        return redirect()->route('tasks')->with('success', 'Task eliminada correctamente');
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

        return view('tasks', compact('tasks'));
    }

    public function create()
    {
        return view('create_task', [
            'employees' => Employee::all()
        ]);
    }
}
