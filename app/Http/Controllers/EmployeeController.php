<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();

        if ($employees->isEmpty()) {
            $data = [
                'message' => 'No hay Employees registrados',
                'status' => '404'
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Employees recuperados correctamente',
            'status' => '200',
            'data' => $employees
        ];

        return response()->json($employees, 200);
    }

    public function store(Request $request)
    {
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:employees,email',
            'password' => 'required|min:8',
            'user_type' => 'required|in:gerente,Employee,RRHH,CEO,marketing'
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

        $employee = Employee::create([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $pwd,
            'user_type' => $request->user_type
        ]);

        if (!$employee) {
            $data = [
                'message' => 'Error al registrar el Employee',
                'status' => 500
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => 'Employee registrado correctamente',
            'status' => 201,
            'data' => $employee
        ];
        return response()->json($data, 201);
    }

    public function show($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            $data = [
                'message' => 'Employee no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $data = [
            'message' => 'Employee recuperado correctamente',
            'status' => 200,
            'data' => $employee
        ];
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            $data = [
                'message' => 'Employee no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:employees,email,' . $id,
            'user_type' => 'required|in:gerente,Employee,RRHH,CEO,marketing'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validación de los datos',
                'status' => 400,
                'data' => $validator->errors()
            ];
            return response()->json($data, 400);
        }

        $employee = Employee::where('id', $id)->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'user_type' => $request->user_type
        ]);

        $data = [
            'message' => 'Employee actualizado correctamente',
            'status' => 200,
            'data' => $employee
        ];
        return response()->json($data, 200);
    }

    public function updatePartial(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            $data = [
                'message' => 'Employee no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = validator::make($request->all(), [
            'name' => '',
            'lastname' => '',
            'email' => '|email|unique:employees,email,' . $id,
            'user_type' => '|in:gerente,Employee,RRHH,CEO,marketing'
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
            $employee->name = $request->name;
        }
        if ($request->has('lastname')) {
            $employee->lastname = $request->lastname;
        }

        if ($request->has('email')) {
            $employee->email = $request->email;
        }
        if ($request->has('user_type')) {
            $employee->user_type = $request->user_type;
        }

        $employee->save();

        $data = [
            'message' => 'Employee actualizado correctamente',
            'status' => 200,
            'data' => $employee
        ];
        return response()->json($data, 200);
    }

    public function delete($id)
    {
        $employee = Employee::find($id);

        if (!$employee) {
            $data = [
                'message' => 'Employee no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $employee->delete();

        $data = [
            'message' => 'Employee eliminado correctamente',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
