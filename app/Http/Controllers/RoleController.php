<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller

   
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles',
        ]);

        Role::create($request->all());
        return redirect()->route('roles.index')->with('success', 'El rol fue creado correctamente.');
    }

    public function edit($id)
    {
        $role = Role::find($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
        ]);

        $role->update($request->all());
        return redirect()->route('roles.index')->with('success', 'El rol fue actualizado correctamente');
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'El rol fue eliminado correctamente');
    }
}

