<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Assists;
use Illuminate\Support\Facades\Validator;

class AssistsController extends Controller
{
    public function index()
    {
        $Assist = Assists::all();

        if ($Assist->isEmpty()) {
            $data = [
                'message' => 'No hay asistencias registradas',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'asistencias recuperadas correctamente',
            'status' => '200',
            'data' => $Assist
        ];

        return response()->json($Assist, 200);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'date' => 'required',
            'entry_time' => 'required',
            'exit_time' => '',
            'employee_id' => 'required|exists:employees,id'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $Assists = Assists::create([
            'date' => $request->date,
            'entry_time' => $request->entry_time,
            'exit_time' => $request->exit_time,
            'employee_id' => $request->employee_id
        ]);

        if (!$Assists) {
            $data = [
                'message' => 'Error al registrar la Assists',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
    }

    public function show($id)
    {
        $Assists = Assists::find($id);

        if (!$Assists) {
            $data = [
                'message' => 'Assists no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Assists recuperada correctamente',
            'status' => 200,
            'data' => $Assists
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $Assists = Assists::find($id);

        if (!$Assists) {
            $data = [
                'message' => 'Assists no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'date' => 'required',
            'entry_time' => 'required',
            'exit_time' => '',
            'employee_id' => 'required|exists:employees,id'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $Assists = Assists::where('id', $id)->update([
            'date' => $request->date,
            'entry_time' => $request->entry_time,
            'exit_time' => $request->exit_time,
            'employee_id' => $request->employee_id
        ]);

        $data = [
            'message' => 'Assists actualizada correctamente',
            'status' => 200,
            'data' => $Assists
        ];

        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $Assists = Assists::find($id);

        if (!$Assists) {
            $data = [
                'message' => 'Assists no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'date' => '',
            'entry_time' => '',
            'exit_time' => '',
            'employee_id' => 'required|exists:employees,id'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        if ($request->has('date')) {
            $Assists->date = $request->date;
        }
        if ($request->has('entry_time')) {
            $Assists->entry_time = $request->entry_time;
        }
        if ($request->has('exit_time')) {
            $Assists->exit_time = $request->exit_time;
        }
        if ($request->has('employee_id')) {
            $Assists->employee_id = $request->employee_id;
        }

        $Assists->save();

        $data = [
            'message' => 'Assists actualizada correctamente',
            'status' => 200,
            'data' => $Assists
        ];

        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $Assists = Assists::find($id);

        if (!$Assists) {
            $data = [
                'message' => 'Assists no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $Assists->delete();

        $data = [
            'message' => 'Assists eliminada correctamente',
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
